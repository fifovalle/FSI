<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idNavbar = $_POST['ID_Navbar'] ?? '';
    $namaBarNavigasi = $_POST['Daftar_Nama'] ?? '';
    $tautanBarNavigasi = $_POST['Tautan'] ?? '';
    $kategori = $_POST['Kategori'] ?? '';
    $subKategori = $_POST['Sub_Kategori'] ?? '';

    $navbarModel = new Navbar($koneksi);

    if ($subKategori === "" || $subKategori === "Pilih Sub Kategori") {
        $subKategori = NULL;
    }

    if (!is_numeric($idNavbar) || $idNavbar <= 0) {
        echo json_encode(array("success" => false, "message" => "ID navbar tidak valid."));
        exit;
    }

    $pattern = "/^https?:\/\/.+$/";

    if (!preg_match($pattern, $tautanBarNavigasi)) {
        echo json_encode(array("success" => false, "message" => "Tautan navbar tidak valid. Harus menggunakan format http atau https."));
        exit;
    }

    $dataNavbar = array(
        'Daftar_Nama' => $namaBarNavigasi,
        'Tautan' => $tautanBarNavigasi,
        'Kategori' => $kategori,
        'Sub_Kategori' => $subKategori
    );

    $subcategories = $navbarModel->getSubcategories($kategori);

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
