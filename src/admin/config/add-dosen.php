<?php
include 'databases.php';
ob_start();  

if (isset($_POST['Simpan'])) {
    $nipNidDosen = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['NIP_NID_Dosen']));
    $namaDosen = mysqli_real_escape_string($koneksi, $_POST['Nama_Dosen']);
    $jabatanDosen = mysqli_real_escape_string($koneksi, $_POST['Jabatan_Dosen']);

    if (empty($nipNidDosen) || empty($namaDosen) || empty($jabatanDosen)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/dosen.php");
        exit;
    }

    $objekDosen = new Dosen($koneksi);

    $dataDosen = array(
        "NIP_NID_Dosen" => $nipNidDosen,
        'Nama_Dosen' => $namaDosen,
        'Jabatan_Dosen' => $jabatanDosen,
    );

    $simpanDataDosen = $objekDosen->tambahDosen($dataDosen);

    if ($simpanDataDosen) {
        setPesanKeberhasilan("Berhasil menyimpan data Dosen.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Dosen.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/dosen.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/dosen.php");
    exit;
}
 ob_end_flush();
