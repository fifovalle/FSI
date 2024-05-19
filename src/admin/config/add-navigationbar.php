<?php
include 'databases.php';
ob_start();  

if (isset($_POST['Simpan'])) {
    $daftarNama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Daftar_Nama']));
    $tautan = mysqli_real_escape_string($koneksi, $_POST['Tautan']);
    $kategori = mysqli_real_escape_string($koneksi, $_POST['Kategori']);

    if (empty($daftarNama) || empty($tautan)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/bar-navigasi.php");
        exit;
    }

    if ($kategori == "Pilih Kategori") {
        setPesanKesalahan("Anda harus memilih kategori.");
        header("Location: $akar_tautan" . "src/admin/pages/bar-navigasi.php");
        exit;
    }

    $objekNavbar = new Navbar($koneksi);

    $dataNavbar = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        'Daftar_Nama' => $daftarNama,
        'Tautan' => $tautan,
        'Kategori' => $kategori,
    );

    $simpanDataNavbar = $objekNavbar->tambahNavbar($dataNavbar);

    if ($simpanDataNavbar) {
        setPesanKeberhasilan("Berhasil menyimpan data Navbar.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Navbar.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/bar-navigasi.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/bar-navigasi.php");
    exit;
}
 ob_end_flush();
