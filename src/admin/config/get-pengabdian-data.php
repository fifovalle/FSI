<?php
include 'databases.php';

$pengabdianMasyarakatModel = new PengabdianMasyarakat($koneksi);

$pengabdianID = isset($_GET['pengabdian_id']) ? $_GET['pengabdian_id'] : null;
$dataPengabdian = $pengabdianMasyarakatModel->tampilkanDataPengabdianMasyarakat($pengabdianID);

$pengabdianDitemukan = null;

foreach ($dataPengabdian as $pengabdian) {
    $pengabdianDitemukan = $pengabdian['ID_Pengabdian'] == $pengabdianID ? $pengabdian : null;
    if ($pengabdianDitemukan) {
        break;
    }
}

echo json_encode($pengabdianDitemukan);
