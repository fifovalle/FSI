<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    $judulPenelitian = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Judul_Penelitian']));
    $linkPenelitian = mysqli_real_escape_string($koneksi, $_POST['Link_Penelitian']);
    $tingkatan = mysqli_real_escape_string($koneksi, $_POST['Tingkatan']);
    $judulJurnal = mysqli_real_escape_string($koneksi, $_POST['Judul_Journal']);
    $linkJurnal = mysqli_real_escape_string($koneksi, $_POST['Link_Journal']);
    $pencipta = mysqli_real_escape_string($koneksi, $_POST['Pencipta']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['Tahun']);

    if (empty($judulPenelitian) || empty($linkPenelitian) || empty($tingkatan) || empty($judulJurnal) || empty($linkJurnal) || empty($pencipta) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/penelitian-sisteminformasi.php");
        exit;
    }

    function validateUrl($url)
    {
        $parsedUrl = parse_url($url);

        if (!isset($parsedUrl['scheme'])) {
            $url = 'https://' . $url;
        }

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        return $url;
    }

    $linkPenelitian = validateUrl($linkPenelitian);
    if ($linkPenelitian === false) {
        setPesanKesalahan("Tautan penelitian tidak valid.");
        header("Location: $akar_tautan" . "src/admin/pages/penelitian-sisteminformasi.php");
        exit;
    }

    $linkJurnal = validateUrl($linkJurnal);
    if ($linkJurnal === false) {
        setPesanKesalahan("Tautan jurnal tidak valid.");
        header("Location: $akar_tautan" . "src/admin/pages/penelitian-sisteminformasi.php");
        exit;
    }

    $objekSistemInformasi = new SistemInformasi($koneksi);

    $dataSistemInformasi = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Judul_Penelitian" => $judulPenelitian,
        'Tautan_Penelitian' => $linkPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Jurnal' => $judulJurnal,
        'Tautan_Jurnal' => $linkJurnal,
        'Pencipta' => $pencipta,
        'Tahun' => $tahun,
    );

    $simpanDataSistemInformasi = $objekSistemInformasi->tambahSistemInformasi($dataSistemInformasi);

    if ($simpanDataSistemInformasi) {
        setPesanKeberhasilan("Berhasil menyimpan data Penelitian Sistem Informasi.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Penelitian Sistem Informasi.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-sisteminformasi.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-sisteminformasi.php");
    exit;
}
ob_end_flush();
