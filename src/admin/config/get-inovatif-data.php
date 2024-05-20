<?php
include 'databases.php';

$produkInovatifModel = new ProdukInovatif($koneksi);

$produkID = isset($_GET['produk_id']) ? $_GET['produk_id'] : null;
$dataProduk = $produkInovatifModel->tampilkanDataProdukInovatif($produkID);

$produkDitemukan = null;

foreach ($dataProduk as $produk) {
    $produkDitemukan = $produk['ID_Produk'] == $produkID ? $produk : null;
    if ($produkDitemukan) {
        break;
    }
}

echo json_encode($produkDitemukan);
