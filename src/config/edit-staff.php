<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idStaff = $_POST['ID_Staff'] ?? '';
    $nipNIDStaff = $_POST['NIP_NID_Staff'] ?? '';
    $namaStaff = $_POST['Nama_Staff'] ?? '';
    $jabatanStaff = $_POST['Jabatan_Staff'] ?? '';

    if (!is_numeric($idStaff) || $idStaff <= 0) {
        echo json_encode(array("success" => false, "message" => "ID staff tidak valid."));
        exit;
    }

    $staffModel = new Staff($koneksi);

    $dataStaff = array(
        'NIP_NID_Staff' => $nipNIDStaff,
        'Nama_Staff' => $namaStaff,
        'Jabatan_Staff' => $jabatanStaff
    );

    $updateDataStaff = $staffModel->perbaruiStaff($idStaff, $dataStaff);

    if ($updateDataStaff) {
        echo json_encode(array("success" => true, "message" => "Data staff berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data staff."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
