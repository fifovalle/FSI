<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    $nipNidStaff = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['NIP_NID_Staff']));
    $namaStaff = mysqli_real_escape_string($koneksi, $_POST['Nama_Staff']);
    $jabatanStaff = mysqli_real_escape_string($koneksi, $_POST['Jabatan_Staff']);

    if (empty($namaStaff) || empty($jabatanStaff)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/Staff.php");
        exit;
    }

    $objekStaff = new Staff($koneksi);

    $dataStaff = array(
        "NIP_NID_Staff" => $nipNidStaff,
        'Nama_Staff' => $namaStaff,
        'Jabatan_Staff' => $jabatanStaff,
    );

    $simpanDataStaff = $objekStaff->tambahStaff($dataStaff);

    if ($simpanDataStaff) {
        setPesanKeberhasilan("Berhasil menyimpan data Staff.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Staff.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/staff.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/staff.php");
    exit;
}
 ob_end_flush();