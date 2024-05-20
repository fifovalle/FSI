<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    $judulPenelitian = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Judul_Penelitian']));
    $tautanPenelitian = mysqli_real_escape_string($koneksi, $_POST['Tautan_Penelitian']);
    $tingkatan = mysqli_real_escape_string($koneksi, $_POST['Tingkatan']);
    $judulJournal = mysqli_real_escape_string($koneksi, $_POST['Judul_Journal']);
    $tautanJournal = mysqli_real_escape_string($koneksi, $_POST['Tautan_Journal']);
    $pencipta = mysqli_real_escape_string($koneksi, $_POST['Pencipta']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['Tahun']);

    if (empty($judulPenelitian) || empty($tautanPenelitian) || empty($tingkatan) || empty($judulJournal) || empty($tautanJournal) || empty($pencipta) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/penelitian-magisterkimia.php");
        exit;
    }

    $objekMagisterKimia = new magisterKimia($koneksi);

    $dataMagisterKimia = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Judul_Penelitian" => $judulPenelitian,
        'Tautan_Penelitian' => $tautanPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Journal' => $judulJournal,
        'Tautan_Journal' => $tautanJournal,
        'Pencipta' => $pencipta,
        'Tahun' => $tahun,
    );

    $simpanDataMagisterKimia = $objekMagisterKimia->tambahMagisterKimia($dataMagisterKimia);

    if ($simpanDataMagisterKimia) {
        setPesanKeberhasilan("Berhasil menyimpan data Penelitian Magister Kimia.");
    } else {
        setPesanKesalahan("Gagal menyimpan data  Penelitian Magister Kimia.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-magisterkimia.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-magisterkimia.php");
    exit;
}
ob_end_flush();
