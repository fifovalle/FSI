<?php
include 'databases.php';

$sistemInformasiModel = new SistemInformasi($koneksi);

$sistemInformasiID = isset($_GET['sistem_informasi_id']) ? $_GET['sistem_informasi_id'] : null;
$dataSistemInformasi = $sistemInformasiModel->tampilkanDataSistemInformasi($sistemInformasiID);

$sistemInformasiDitemukan = null;

foreach ($dataSistemInformasi as $sistemInformasi) {
    $sistemInformasiDitemukan = $sistemInformasi['ID_Sistem_Informasi'] == $sistemInformasiID ? $sistemInformasi : null;
    if ($sistemInformasiDitemukan) {
        break;
    }
}

echo json_encode($sistemInformasiDitemukan);
