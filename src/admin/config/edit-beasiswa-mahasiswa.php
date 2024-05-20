<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idBeasiswa = $_POST['ID_Beasiswa'] ?? '';
    $namaPenerima = $_POST['Nama_Penerima'] ?? '';
    $namaBeasiswa = $_POST['Nama_Beasiswa'] ?? '';
    $durasiBeasiswa = $_POST['Durasi_Beasiswa'] ?? '';
    $Instagram = $_POST['Instagram'] ?? '';
    $Website = $_POST['Website'] ?? '';

    $beasiswaMahasiswaModel = new beasiswaMahasiswa($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar_Beasiswa']) && ($_FILES['Gambar_Beasiswa']['size'] > 0)) {
        $gambarBeasiswa = $_FILES['Gambar_Beasiswa'];
        $lokasiFile = $gambarBeasiswa['tmp_name'];
        $ekstensiFile = pathinfo($gambarBeasiswa['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarBeasiswa = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarBeasiswa)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    $beasiswaLama = $beasiswaMahasiswaModel->getGambarBeasiswaById($idBeasiswa);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $beasiswaLama;
    }

    if (!empty($beasiswaLama) && $namaFileBaru !== $beasiswaLama) {
        unlink('../../uploads/' . $beasiswaLama);
    }

    $dataBeasiswa = array(
        'Nama_Penerima' => $namaPenerima,
        'Nama_Beasiswa' => $namaBeasiswa,
        'Durasi_Beasiswa' => $durasiBeasiswa,
        'Link_Instagram' => $Instagram,
        'Link_Website' => $Website,
        'Gambar' => $namaFileBaru
    );

    $updateDataBeasiswa = $beasiswaMahasiswaModel->perbaruiBeasiswaMahasiswa($idBeasiswa, $dataBeasiswa);

    if ($updateDataBeasiswa) {
        echo json_encode(array("success" => true, "message" => "Data beasiswa berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data beasiswa."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
