<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProduk = $_POST['ID_Produk'] ?? '';
    $judulInovasi = $_POST['Judul_Inovasi'] ?? '';
    $tautanInovasi = $_POST['Link_Inovasi'] ?? '';
    $leader = $_POST['Leader'] ?? '';
    $judulEvent = $_POST['Judul_Event'] ?? '';
    $personil = $_POST['Personil'] ?? '';
    $tahun = $_POST['Tahun'] ?? '';

    if (!is_numeric($idProduk) || $idProduk <= 0) {
        echo json_encode(array("success" => false, "message" => "ID produk tidak valid."));
        exit;
    }

    $produkInovatif = new ProdukInovatif($koneksi);

    $dataProdukInovatif = array(
        'Judul_Inovasi' => $judulInovasi,
        'Tautan_Inovasi' => $tautanInovasi,
        'Leader' => $leader,
        'Event' => $judulEvent,
        'Personil' => $personil,
        'Tahun' => $tahun
    );

    $updateDataProdukInovatif = $produkInovatif->perbaruiProdukInovatif($idProduk, $dataProdukInovatif);

    if ($updateDataProdukInovatif) {
        echo json_encode(array("success" => true, "message" => "Data produk inovatif berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data produk inovatif."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
