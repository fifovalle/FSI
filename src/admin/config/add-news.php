<?php
include 'databases.php';
ob_start();  

if (isset($_POST['Simpan'])) {
    if (empty($_POST['Judul']) || empty($_POST['Isi_Berita']) || empty($_POST['Tanggal_Terbit'])) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/berita.php");
        exit;
    }

    $namaFile = $_FILES['Gambar']['name'];
    $lokasiFile = $_FILES['Gambar']['tmp_name'];

    if (empty($namaFile)) {
        setPesanKesalahan("Gambar tidak diunggah. Silakan upload gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/berita.php");
        exit;
    }

    $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileUnik = uniqid('berita_') . '.' . $ekstensiFile;
    $tujuanFile = '../../uploads/' . $namaFileUnik;

    if (move_uploaded_file($lokasiFile, $tujuanFile)) {
        $gambar = $namaFileUnik;
        $judul = mysqli_real_escape_string($koneksi, $_POST['Judul']);
        $isiBerita = mysqli_real_escape_string($koneksi, $_POST['Isi_Berita']);
        $tanggalTerbit = mysqli_real_escape_string($koneksi, $_POST['Tanggal_Terbit']);

        $objekBerita = new Berita($koneksi);

        $dataBerita = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Gambar' => $gambar,
            'Judul' => $judul,
            'Isi_Berita' => $isiBerita,
            'Tanggal_Terbit' => $tanggalTerbit,
        );

        $simpanDataBerita = $objekBerita->tambahBerita($dataBerita);

        if ($simpanDataBerita) {
            setPesanKeberhasilan("Berhasil menyimpan data Berita.");
        } else {
            setPesanKesalahan("Gagal menyimpan data Berita.");
        }
        header("Location: $akar_tautan" . "src/admin/pages/berita.php");
        exit;
    } else {
        setPesanKesalahan("Gagal mengunggah file Gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/berita.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/berita.php");
    exit;
}
 ob_end_flush();
