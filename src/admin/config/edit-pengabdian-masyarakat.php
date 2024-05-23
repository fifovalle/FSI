<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPengabdian = $_POST['ID_Pengabdian'] ?? '';
    $judulPengabdian = $_POST['Judul_Pengabdian'] ?? '';
    $tautanPengabdian = $_POST['Link_Pengabdian'] ?? '';
    $leader = $_POST['Leader'] ?? '';
    $judulEvent = $_POST['Judul_Event'] ?? '';
    $personil = $_POST['Personil'] ?? '';
    $tahun = $_POST['Tahun'] ?? '';

    if (!is_numeric($idPengabdian) || $idPengabdian <= 0) {
        echo json_encode(array("success" => false, "message" => "ID produk tidak valid."));
        exit;
    }

    $pattern = "/^https:\/\/.+$/";

    if (!preg_match($pattern, $tautanPengabdian)) {
        echo json_encode(array("success" => false, "message" => "Tautan Pengabdian tidak valid. Harus menggunakan format https."));
        exit;
    }

    $pengabdianMasyarakatModel = new PengabdianMasyarakat($koneksi);

    $datapengabdianMasyarakat = array(
        'Judul_Pengabdian' => $judulPengabdian,
        'Tautan_Pengabdian' => $tautanPengabdian,
        'Leader' => $leader,
        'Event' => $judulEvent,
        'Personil' => $personil,
        'Tahun' => $tahun
    );

    $updateDatapengabdianMasyarakat = $pengabdianMasyarakatModel->perbaruiPengabdianMasyarakat($idPengabdian, $datapengabdianMasyarakat);

    if ($updateDatapengabdianMasyarakat) {
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
