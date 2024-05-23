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

    $objekProdukInovatif = new ProdukInovatif($koneksi);

    if (empty($judulInovasi) || empty($linkInovasi) || empty($leader) || empty($judulEvent) || empty($personil) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/produk-inovatif.php");
        exit;
    }

    $pattern = "/^https?:\/\/.+$/";

    if (!preg_match($pattern, $linkInovasi)) {
        setPesanKesalahan("Tautan Produk Inovatif tidak valid. Harus menggunakan format http atau https.");
        header("Location: " . $akar_tautan . "src/admin/pages/produk-inovatif.php");
        exit;
    }

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
