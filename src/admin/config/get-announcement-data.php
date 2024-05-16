<?php
include 'databases.php';

$pengumumanModel = new Pengumuman($koneksi);

$pengumumanID = isset($_GET['pengumuman_id']) ? $_GET['pengumuman_id'] : null;
$dataPengumuman = $pengumumanModel->tampilkanDataPengumuman($pengumumanID);

$pengumumanDitemukan = null;

foreach ($dataPengumuman as $pengumuman) {
    $pengumumanDitemukan = $pengumuman['ID_Pengumuman'] == $pengumumanID ? $pengumuman : null;
    if ($pengumumanDitemukan) {
        break;
    }
}

echo json_encode($pengumumanDitemukan);
