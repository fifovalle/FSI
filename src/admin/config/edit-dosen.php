<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idDosen = $_POST['ID_Dosen'] ?? '';
    $nipNidDosen = $_POST['NIP_NID_Dosen'] ?? '';
    $namaDosen = $_POST['Nama_Dosen'] ?? '';
    $jabatanDosen = $_POST['Jabatan_Dosen'] ?? '';

    if (!is_numeric($idDosen) || $idDosen <= 0) {
        echo json_encode(array("success" => false, "message" => "ID dosen tidak valid."));
        exit;
    }

    $dosenModel = new Dosen($koneksi);

    $dataDosen = array(
        'NIP_NID_Dosen' => $nipNidDosen,
        'Nama_Dosen' => $namaDosen,
        'Jabatan_Dosen' => $jabatanDosen
    );

    $updateDataDosen = $dosenModel->perbaruiDosen($idDosen, $dataDosen);

    if ($updateDataDosen) {
        echo json_encode(array("success" => true, "message" => "Data dosen berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data dosen."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
