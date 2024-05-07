<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProdi = $_POST['ID_Prodi'] ?? '';
    $namaProdi = $_POST['Nama_Prodi'] ?? '';

    if (!is_numeric($idProdi) || $idProdi <= 0) {
        echo json_encode(array("success" => false, "message" => "ID program studi tidak valid."));
        exit;
    }

    $prodiModel = new ProgramStudi($koneksi);

    $dataProdi = array(
        'Nama_Prodi' => $namaProdi
    );

    $updateDataProdi = $prodiModel->perbaruiProgramStudi($idProdi, $dataProdi);

    if ($updateDataProdi) {
        echo json_encode(array("success" => true, "message" => "Data program studi berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data program studi."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
