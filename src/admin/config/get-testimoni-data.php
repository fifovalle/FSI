<?php
include 'databases.php';

$testimoniModel = new Testimoni($koneksi);

$testimoniID = isset($_GET['testimoni_id']) ? $_GET['testimoni_id'] : null;
$dataTestimoni = $testimoniModel->tampilkanDataTestimoni($testimoniID);

$testimoniDitemukan = null;

foreach ($dataTestimoni as $testimoni) {
    $testimoniDitemukan = $testimoni['ID_Testimoni'] == $testimoniID ? $testimoni : null;
    if ($testimoniDitemukan) {
        break;
    }
}

echo json_encode($testimoniDitemukan);
