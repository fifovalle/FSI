<?php
include 'databases.php';
ob_start();

function containsXSS($input)
{
    $xss_patterns = [
        "/<script\b[^>]*>(.*?)<\/script>/is",
        "/<img\b[^>]*src[\s]*=[\s]*[\"]*javascript:/i",
        "/<iframe\b[^>]*>(.*?)<\/iframe>/is",
        "/<link\b[^>]*href[\s]*=[\s]*[\"]*javascript:/i",
        "/<object\b[^>]*>(.*?)<\/object>/is",
        "/on[a-zA-Z]+\s*=\s*\"[^\"]*\"/i",
        "/on[a-zA-Z]+\s*=\s*\"[^\"]*\"/i",
        "/<script\b[^>]*>[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i",
        "/<a\b[^>]*href\s*=\s*(?:\"|')(?:javascript:|.*?\"javascript:).*?(?:\"|')/i",
        "/<embed\b[^>]*>(.*?)<\/embed>/is",
        "/<applet\b[^>]*>(.*?)<\/applet>/is",
        "/<!--.*?-->/",
        "/(<script\b[^>]*>(.*?)<\/script>|<img\b[^>]*src[\s]*=[\s]*[\"]*javascript:|<iframe\b[^>]*>(.*?)<\/iframe>|<link\b[^>]*href[\s]*=[\s]*[\"]*javascript:|<object\b[^>]*>(.*?)<\/object>|on[a-zA-Z]+\s*=\s*\"[^\"]*\"|<[^>]*(>|$)(?:<|>)+|<[^>]*script\s*.*?(?:>|$)|<![^>]*-->|eval\s*\((.*?)\)|setTimeout\s*\((.*?)\)|<[^>]*\bstyle\s*=\s*[\"'][^\"']*[;{][^\"']*['\"]|<meta[^>]*http-equiv=[\"']?refresh[\"']?[^>]*url=|<[^>]*src\s*=\s*\"[^>]*\"[^>]*>|expression\s*\((.*?)\))/i"
    ];

    foreach ($xss_patterns as $pattern) {
        if (preg_match($pattern, $input)) {
            return true;
        }
    }

    return false;
}

if (isset($_POST['Simpan'])) {
    require_once '../../../vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
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
