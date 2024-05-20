<?php
include 'databases.php';

$prestasiMahasiswaModel = new prestasiMahasiswa($koneksi);

$prestasiID = isset($_GET['presstasi_id']) ? $_GET['presstasi_id'] : null;
$dataPrestasi = $prestasiMahasiswaModel->tampilkanDataPrestasiMahasiswa($prestasiID);

$prestasiDitemukan = null;

foreach ($dataPrestasi as $prestasi) {
    $prestasiDitemukan = $prestasi['ID_Prestasi'] == $prestasiID ? $prestasi : null;
    if ($prestasiDitemukan) {
        break;
    }
}

echo json_encode($prestasiDitemukan);
