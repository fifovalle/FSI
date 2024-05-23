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

    if (empty($judulPenelitian) || empty($linkPenelitian) || empty($tingkatan) || empty($judulJurnal) || empty($linkJurnal) || empty($pencipta) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/penelitian-kimia.php");
        exit;
    }

    $pattern = "/^https?:\/\/.+$/";

    if (!preg_match($pattern, $linkPenelitian)) {
        setPesanKesalahan("Tautan penelitian tidak valid. Harus menggunakan format http atau https.");
        header("Location: " . $akar_tautan . "src/admin/pages/penelitian-kimia.php");
        exit;
    }

    if (!preg_match($pattern, $linkJurnal)) {
        setPesanKesalahan("Tautan jurnal tidak valid. Harus menggunakan format http atau https.");
        header("Location: " . $akar_tautan . "src/admin/pages/penelitian-kimia.php");
        exit;
    }

    $objekKimia = new Kimia($koneksi);

    $dataKimia = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Judul_Penelitian" => $judulPenelitian,
        'Tautan_Penelitian' => $linkPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Jurnal' => $judulJurnal,
        'Tautan_Jurnal' => $linkJurnal,
        'Pencipta' => $pencipta,
        'Tahun' => $tahun,
    );

    $simpanDataKimia = $objekKimia->tambahKimia($dataKimia);

    if ($simpanDataKimia) {
        setPesanKeberhasilan("Berhasil menyimpan data Penelitian Kimia.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Penelitian Kimia.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-kimia.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-kimia.php");
    exit;
}
ob_end_flush();
