<?php
include 'databases.php';

$dosenModel = new Dosen($koneksi);

$dosenID = isset($_GET['dosen_id']) ? $_GET['dosen_id'] : null;
$dataDosen = $dosenModel->tampilkanDataDosen($dosenID);

$dosenDitemukan = null;

foreach ($dataDosen as $dosen) {
    $dosenDitemukan = $dosen['ID_Dosen'] == $dosenID ? $dosen : null;
    if ($dosenDitemukan) {
        break;
    }
}

echo json_encode($dosenDitemukan);
