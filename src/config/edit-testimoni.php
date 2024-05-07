<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idTestimoni = $_POST['ID_Testimoni'] ?? '';
    $namaMahasiswa = $_POST['Nama_Mahasiswa'] ?? '';
    $kesanMahasiswa = $_POST['Kesan_Mahasiswa'] ?? '';
    $tanggalTestimoni = $_POST['Tanggal_Testimoni'] ?? '';

    if (!isset($_FILES['Foto_Mahasiswa'])) {
        echo json_encode(array("success" => false, "message" => "Foto mahasiswa tidak tersedia."));
        exit;
    }

    $fotoMahasiswa = $_FILES['Foto_Mahasiswa'];
    $namaFileBaru = uniqid() . '_' . $fotoMahasiswa['name'];
    $lokasiFile = '../uploads/' . $namaFileBaru;

    $testimoniModel = new Testimoni($koneksi);

    $fotoLama = $testimoniModel->getFotoMahasiswaById($idTestimoni);

    if (!empty($fotoLama)) {
        unlink('../uploads/' . $fotoLama);
    }

    if (!move_uploaded_file($fotoMahasiswa['tmp_name'], $lokasiFile)) {
        echo json_encode(array("success" => false, "message" => "Gagal mengunggah foto mahasiswa."));
        exit;
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
