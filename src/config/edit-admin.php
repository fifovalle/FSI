<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAdmin = $_POST['ID_Admin'] ?? '';
    $namaAdmin = $_POST['Nama_Admin'] ?? '';
    $emailAdmin = $_POST['Email_Admin'] ?? '';
    $jenisKelaminAdmin = $_POST['Jenis_Kelamin_Admin'] ?? '';

    $adminModel = new Admin($koneksi);

    $dataAdmin = array(
        'Nama_Admin' => $namaAdmin,
        'Email_Admin' => $emailAdmin,
        'Jenis_Kelamin_Admin' => $jenisKelaminAdmin
    );

    $updateDataAdmin = $adminModel->perbaruiAdmin($idAdmin, $dataAdmin);

    if ($updateDataAdmin) {
        echo json_encode(array("success" => true, "message" => "Data admin berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data admin."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
