<?php
include 'databases.php';

$beritaModel = new Berita($koneksi);

$beritaID = isset($_GET['berita_id']) ? $_GET['berita_id'] : null;
$dataBerita = $beritaModel->tampilkanDataBerita($beritaID);

$beritaDitemukan = null;

foreach ($dataBerita as $berita) {
    $beritaDitemukan = $berita['ID_Berita'] == $beritaID ? $berita : null;
    if ($beritaDitemukan) {
        break;
    }
}

echo json_encode($beritaDitemukan);
