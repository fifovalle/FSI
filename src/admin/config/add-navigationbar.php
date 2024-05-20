<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    $daftarNama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Daftar_Nama']));
    $tautan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Tautan']));
    $kategori = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Kategori']));
    $subKategori = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Sub_Kategori']));

    if (empty($daftarNama) || empty($tautan)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: " . $akar_tautan . "src/admin/pages/bar-navigasi.php");
        exit;
    }

    $valid_kategori = ['Profil', 'SDM', 'Akademik', 'Fasilitas', 'Penjaminan Mutu'];
    if (!in_array($kategori, $valid_kategori)) {
        setPesanKesalahan("Anda harus memilih kategori yang valid.");
        header("Location: " . $akar_tautan . "src/admin/pages/bar-navigasi.php");
        exit;
    }

    if ($subKategori === "" || $subKategori === "Pilih Sub Kategori") {
        $subKategori = NULL;
    }

    $subKategoriValue = $subKategori === NULL ? "NULL" : "'" . mysqli_real_escape_string($koneksi, $subKategori) . "'";

    $query = "INSERT INTO Navbar (ID_Admin, Daftar_Nama, Tautan, Kategori, Sub_Kategori) 
              VALUES ('" . mysqli_real_escape_string($koneksi, $_SESSION['ID_Admin']) . "', 
                      '" . mysqli_real_escape_string($koneksi, $daftarNama) . "', 
                      '" . mysqli_real_escape_string($koneksi, $tautan) . "', 
                      '" . mysqli_real_escape_string($koneksi, $kategori) . "', 
                      $subKategoriValue)";

    $simpanDataNavbar = mysqli_query($koneksi, $query);

    if ($simpanDataNavbar) {
        setPesanKeberhasilan("Berhasil menyimpan data Navbar.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Navbar.");
    }
    header("Location: " . $akar_tautan . "src/admin/pages/bar-navigasi.php");
    exit;
} else {
    header("Location: " . $akar_tautan . "src/admin/pages/bar-navigasi.php");
    exit;
}
ob_end_flush();
