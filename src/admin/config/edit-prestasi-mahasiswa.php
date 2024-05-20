<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPrestasi = $_POST['ID_Prestasi'] ?? '';
    $namaMahasiswa = $_POST['Nama_Mahasiswa'] ?? '';
    $namaKegiatan = $_POST['Nama_Kegiatan'] ?? '';
    $pencapaian = $_POST['Pencapaian'] ?? '';
    $tahunPencapaian = $_POST['Tahun_Pencapaian'] ?? '';

    $prestasiMahasiswaModel = new prestasiMahasiswa($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar_Prestasi']) && ($_FILES['Gambar_Prestasi']['size'] > 0)) {
        $gambarPrestasi = $_FILES['Gambar_Prestasi'];
        $lokasiFile = $gambarPrestasi['tmp_name'];
        $ekstensiFile = pathinfo($gambarPrestasi['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarPrestasi = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarPrestasi)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    $prestasiLama = $prestasiMahasiswaModel->getGambarPrestasiById($idPrestasi);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $prestasiLama;
    }

    if (!empty($prestasiLama) && $namaFileBaru !== $prestasiLama) {
        unlink('../../uploads/' . $prestasiLama);
    }

    $dataPrestasi = array(
        'Nama_Mahasiswa' => $namaMahasiswa,
        'Kegiatan' => $namaKegiatan,
        'Pencapaian' => $pencapaian,
        'Tahun_Pencapaian' => $tahunPencapaian,
        'Gambar' => $namaFileBaru
    );

    $updateDataPrestasi = $prestasiMahasiswaModel->perbaruiPrestasiMahasiswa($idPrestasi, $dataPrestasi);

    if ($updateDataPrestasi) {
        echo json_encode(array("success" => true, "message" => "Data prestasi berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data prestasi."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
