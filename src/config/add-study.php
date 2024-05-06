<?php
include 'databases.php';

if (isset($_POST['Simpan'])) {
    $programStudi = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Nama_Prodi']));

    if (empty($programStudi)) {
        setPesanKesalahan("Field harus diisi.");
        header("Location: $akar_tautan" . "src/pages/program-studi.php");
        exit;
    }

    $objekProgramStudi = new ProgramStudi($koneksi);

    $dataProgramStudi = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        'Nama_Prodi' => $programStudi,
    );

    $simpanDataProgramStudi = $objekProgramStudi->tambahProgramStudi($dataProgramStudi);

    if ($simpanDataProgramStudi) {
        setPesanKeberhasilan("Berhasil menyimpan data Program Studi.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Program Studi.");
    }
    header("Location: $akar_tautan" . "src/pages/program-studi.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/pages/program-studi.php");
    exit;
}
