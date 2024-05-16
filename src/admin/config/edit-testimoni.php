<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idTestimoni = $_POST['ID_Testimoni'] ?? '';
    $namaMahasiswa = $_POST['Nama_Mahasiswa'] ?? '';
    $kesanMahasiswa = $_POST['Kesan_Mahasiswa'] ?? '';
    $tanggalTestimoni = $_POST['Tanggal_Testimoni'] ?? '';

    $namaFileBaru = '';

    if (isset($_FILES['Foto_Mahasiswa']) && $_FILES['Foto_Mahasiswa']['size'] > 0) {
        $fotoMahasiswa = $_FILES['Foto_Mahasiswa'];
        $lokasiFile = $fotoMahasiswa['tmp_name'];
        $ekstensiFile = pathinfo($fotoMahasiswa['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        list($width, $height) = getimagesize($lokasiFile);
        $targetWidth = 300;
        $targetHeight = 300;
        if ($width < $targetWidth || $height < $targetHeight) {
            echo json_encode(array("success" => false, "message" => "Ukuran gambar terlalu kecil. Harus minimal 300x300 px."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $lokasiFileBaru = '../../uploads/' . $namaFileBaru;

        $sourceImage = imagecreatefromstring(file_get_contents($lokasiFile));
        $croppedImage = imagecropauto($sourceImage);
        if ($croppedImage === false || !imagejpeg($croppedImage, $lokasiFileBaru)) {
            echo json_encode(array("success" => false, "message" => "Gagal menyimpan foto mahasiswa yang sudah di-crop."));
            exit;
        }
        imagedestroy($sourceImage);
        imagedestroy($croppedImage);
        unlink($lokasiFile);
    }

    $testimoniModel = new Testimoni($koneksi);

    $fotoLama = $testimoniModel->getFotoMahasiswaById($idTestimoni);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $fotoLama;
    }

    if (!empty($fotoLama) && $namaFileBaru !== $fotoLama) {
        unlink('../../uploads/' . $fotoLama);
    }

    $dataTestimoni = array(
        'Nama_Mahasiswa' => $namaMahasiswa,
        'Kesan_Mahasiswa' => $kesanMahasiswa,
        'Tanggal_Testimoni' => $tanggalTestimoni,
        'Foto_Mahasiswa' => $namaFileBaru
    );

    $updateDataTestimoni = $testimoniModel->perbaruiTestimoni($idTestimoni, $dataTestimoni);

    if ($updateDataTestimoni) {
        echo json_encode(array("success" => true, "message" => "Data testimoni berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data testimoni."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
