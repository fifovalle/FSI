<?php
include 'databases.php';

if (isset($_POST['Simpan'])) {
    $daftarNama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Daftar_Nama']));
    $tautan = mysqli_real_escape_string($koneksi, $_POST['Tautan']);

    if (!filter_var($tautan, FILTER_VALIDATE_URL)) {
        setPesanKesalahan("Tautan harus berupa URL yang valid.");
        header("Location: $akar_tautan" . "src/pages/bar-navigasi.php");
        exit;
    }

    if (empty($daftarNama) || empty($tautan)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/pages/bar-navigasi.php");
        exit;
    }

    $objekNavbar = new Navbar($koneksi);

    $dataNavbar = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        'Daftar_Nama' => $daftarNama,
        'Tautan' => $tautan,
    );

    $simpanDataNavbar = $objekNavbar->tambahNavbar($dataNavbar);

    if ($simpanDataNavbar) {
        setPesanKeberhasilan("Berhasil menyimpan data Navbar.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Navbar.");
    }
    header("Location: $akar_tautan" . "src/pages/bar-navigasi.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/pages/bar-navigasi.php");
    exit;
}
