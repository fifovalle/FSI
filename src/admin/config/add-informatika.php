<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    $judulPenelitian = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Judul_Penelitian']));
    $linkPenelitian = mysqli_real_escape_string($koneksi, $_POST['Link_Penelitian']);
    $tingkatan = mysqli_real_escape_string($koneksi, $_POST['Tingkatan']);
    $judulJurnal = mysqli_real_escape_string($koneksi, $_POST['Judul_Jurnal']);
    $linkJurnal = mysqli_real_escape_string($koneksi, $_POST['Link_Jurnal']);
    $pencipta = mysqli_real_escape_string($koneksi, $_POST['Pencipta']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['Tahun']);

    $objekInformatika = new Informatika($koneksi);

    if (empty($judulPenelitian) || empty($linkPenelitian) || empty($tingkatan) || empty($judulJurnal) || empty($linkJurnal) || empty($pencipta) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
        exit;
    }

    $pattern = "/^https?:\/\/.+$/";

    if (!preg_match($pattern, $linkPenelitian)) {
        setPesanKesalahan("Tautan penelitian tidak valid. Harus menggunakan format http atau https.");
        header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
        exit;
    }

    if (!preg_match($pattern, $linkJurnal)) {
        setPesanKesalahan("Tautan jurnal tidak valid. Harus menggunakan format http atau https.");
        header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
        exit;
    }

    $dataInformatika = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Judul_Penelitian" => $judulPenelitian,
        'Link_Penelitian' => $linkPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Jurnal' => $judulJurnal,
        'Link_Jurnal' => $linkJurnal,
        'Pencipta' => $pencipta,
        'Tahun' => $tahun,
    );

    $simpanDataInformatika = $objekInformatika->tambahInformatika($dataInformatika);

    if ($simpanDataInformatika) {
        setPesanKeberhasilan("Berhasil menyimpan data Penelitian Teknik Informatika.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Penelitian Teknik Informatika.");
    }
    header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
    exit;
} else {
    header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
    exit;
}
ob_end_flush();
