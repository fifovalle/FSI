<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idNavbar = $_POST['ID_Navbar'] ?? '';
    $namaBarNavigasi = $_POST['Daftar_Nama'] ?? '';
    $tautanBarNavigasi = $_POST['Tautan'] ?? '';

    if (!is_numeric($idNavbar) || $idNavbar <= 0) {
        echo json_encode(array("success" => false, "message" => "ID navbar tidak valid."));
        exit;
    }

    $parsedUrl = parse_url($tautanBarNavigasi);
    if (!isset($parsedUrl['scheme'])) {
        $tautanBarNavigasi = 'http://' . $tautanBarNavigasi;
    }

    if (!filter_var($tautanBarNavigasi, FILTER_VALIDATE_URL)) {
        echo json_encode(array("success" => false, "message" => "Tautan tidak valid."));
        exit;
    }

    $navbarModel = new Navbar($koneksi);

    $dataNavbar = array(
        'Daftar_Nama' => $namaBarNavigasi,
        'Tautan' => $tautanBarNavigasi
    );

    $updateDataNavbar = $navbarModel->perbaruiNavbar($idNavbar, $dataNavbar);

    if ($updateDataNavbar) {
        echo json_encode(array("success" => true, "message" => "Data navbar berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data navbar."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
