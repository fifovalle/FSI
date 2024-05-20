<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    $judulInovasi = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Judul_Inovasi']));
    $linkInovasi = $_POST['Link_Inovasi'];
    $leader = mysqli_real_escape_string($koneksi, $_POST['Leader']);
    $judulEvent = mysqli_real_escape_string($koneksi, $_POST['Judul_Event']);
    $personil = mysqli_real_escape_string($koneksi, $_POST['Personil']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['Tahun']);

    $parsedUrl = parse_url($linkInovasi);
    if (!isset($parsedUrl['scheme'])) {
        $linkInovasi = 'https://' . $linkInovasi;
    }

    if (!filter_var($linkInovasi, FILTER_VALIDATE_URL)) {
        setPesanKesalahan("Tautan inovasi tidak valid.");
        header("Location: $akar_tautan" . "src/admin/pages/produk-inovatif.php");
        exit;
    }

    if (empty($judulInovasi) || empty($linkInovasi) || empty($leader) || empty($judulEvent) || empty($personil) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/produk-inovatif.php");
        exit;
    }

    $objekProdukInovatif = new ProdukInovatif($koneksi);

    $dataProdukInovatif = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Judul_Inovasi" => $judulInovasi,
        'Tautan_Inovasi' => $linkInovasi,
        'Leader' => $leader,
        'Event' => $judulEvent,
        'Personil' => $personil,
        'Tahun' => $tahun,
    );

    $simpanDataProdukInovatif = $objekProdukInovatif->tambahProdukInovatif($dataProdukInovatif);

    if ($simpanDataProdukInovatif) {
        setPesanKeberhasilan("Berhasil menyimpan data Produk Inovatif.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Produk Inovatif.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/produk-inovatif.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/produk-inovatif.php");
    exit;
}
ob_end_flush();
