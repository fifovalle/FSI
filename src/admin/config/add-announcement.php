<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    if (empty($_POST['Judul_Pengumuman']) || empty($_POST['Isi_Pengumuman'])) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    }

    $namaFile = $_FILES['Foto_Pengumuman']['name'];
    $lokasiFile = $_FILES['Foto_Pengumuman']['tmp_name'];

    if (empty($namaFile)) {
        setPesanKesalahan("Foto tidak diunggah. Silakan upload foto.");
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    }

    $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileUnik = uniqid('pengumuman_') . '.' . $ekstensiFile;
    $tujuanFile = '../../uploads/' . $namaFileUnik;

    if (move_uploaded_file($lokasiFile, $tujuanFile)) {
        $fotoPengumuman = $namaFileUnik;
        $judulPengumuman = mysqli_real_escape_string($koneksi, $_POST['Judul_Pengumuman']);
        $isiPengumuman = mysqli_real_escape_string($koneksi, $_POST['Isi_Pengumuman']);

        $objekPengumuman = new Pengumuman($koneksi);

        $dataPengumuman = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Foto_Pengumuman' => $fotoPengumuman,
            'Judul_Pengumuman' => $judulPengumuman,
            'Isi_Pengumuman' => $isiPengumuman,
        );

        $simpanDataPengumuman = $objekPengumuman->tambahPengumuman($dataPengumuman);

        if ($simpanDataPengumuman) {
            setPesanKeberhasilan("Berhasil menyimpan data Pengumuman.");
        } else {
            setPesanKesalahan("Gagal menyimpan data Pengumuman.");
        }
        header("Location: $akar_tautan" . "src/admin/pages/announcement.php");
        exit;
    } else {
        setPesanKesalahan("Gagal mengunggah file Foto.");
        header("Location: $akar_tautan" . "src/admin/pages/announcement.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/announcement.php");
    exit;
}
ob_end_flush();
