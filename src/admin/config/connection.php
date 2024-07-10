<?php
session_start();
$akar_tautan = "http://localhost/UNJANI/";

$nama_server = "localhost";
$nama_pengguna = "root";
$kata_sandi = "";
$nama_database = "unjani";

$koneksi = new mysqli($nama_server, $nama_pengguna, $kata_sandi, $nama_database);

$halamanSaatIni = basename($_SERVER['PHP_SELF']);

$_SESSION['gagal'] = $_SESSION['gagal'] ?? '';

function setPesanKesalahan($pesan_kesalahan)
{
    $_SESSION['gagal'] = $pesan_kesalahan;
}
function setPesanKeberhasilan($pesan_keberhasilan)
{
    $_SESSION['berhasil'] = $pesan_keberhasilan;
}
