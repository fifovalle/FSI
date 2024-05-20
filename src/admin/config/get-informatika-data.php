<?php
include 'databases.php';

$informatikaModel = new Informatika($koneksi);

$informatikaID = isset($_GET['informatika_id']) ? $_GET['informatika_id'] : null;
$dataInformatika = $informatikaModel->tampilkanDataTeknikInformatika($informatikaID);

$informatikaDitemukan = null;

foreach ($dataInformatika as $informatika) {
    $informatikaDitemukan = $informatika['ID_Penelitian_If'] == $informatikaID ? $informatika : null;
    if ($informatikaDitemukan) {
        break;
    }
}

echo json_encode($informatikaDitemukan);
