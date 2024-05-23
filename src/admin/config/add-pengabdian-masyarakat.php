<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    $judulPengabdian = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Judul_Pengabdian']));
    $linkPengabdian = $_POST['Link_Pengabdian'];
    $leader = mysqli_real_escape_string($koneksi, $_POST['Leader']);
    $judulEvent = mysqli_real_escape_string($koneksi, $_POST['Judul_Event']);
    $personil = mysqli_real_escape_string($koneksi, $_POST['Personil']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['Tahun']);

    $objekPengabdianMasyarakat = new PengabdianMasyarakat($koneksi);

    if (empty($judulPengabdian) || empty($linkPengabdian) || empty($leader) || empty($judulEvent) || empty($personil) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/pengabdian-masyarakat.php");
        exit;
    }

    $pattern = "/^https?:\/\/.+$/";

    if (!preg_match($pattern, $linkPengabdian)) {
        setPesanKesalahan("Tautan Pengabdian tidak valid. Harus menggunakan format http atau https.");
        header("Location: " . $akar_tautan . "src/admin/pages/pengabdian-masyarakat.php");
        exit;
    }

    $dataPengabdianMasyarakat = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Judul_Pengabdian" => $judulPengabdian,
        'Tautan_Pengabdian' => $linkPengabdian,
        'Leader' => $leader,
        'Event' => $judulEvent,
        'Personil' => $personil,
        'Tahun' => $tahun,
    );

    $simpanDataPengabdianMasyarakat = $objekPengabdianMasyarakat->tambahPengabdianMasyarakat($dataPengabdianMasyarakat);

    if ($simpanDataPengabdianMasyarakat) {
        setPesanKeberhasilan("Berhasil menyimpan data Pengabdian Masyarakat.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Pengabdian Masyarakat.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/pengabdian-masyarakat.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/pengabdian-masyarakat.php");
    exit;
}
ob_end_flush();
