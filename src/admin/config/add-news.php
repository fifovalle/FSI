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
    if (empty($_POST['Judul']) || empty($_POST['Isi_Berita']) || empty($_POST['Tanggal_Terbit'])) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/berita.php");
        exit;
    }

    $namaFile = $_FILES['Gambar']['name'];
    $lokasiFile = $_FILES['Gambar']['tmp_name'];

    if (empty($namaFile)) {
        setPesanKesalahan("Gambar tidak diunggah. Silakan upload gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/berita.php");
        exit;
    }

    $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileUnik = uniqid('berita_') . '.' . $ekstensiFile;
    $tujuanFile = '../../uploads/' . $namaFileUnik;

    if (move_uploaded_file($lokasiFile, $tujuanFile)) {
        $gambar = $namaFileUnik;
        $judul = mysqli_real_escape_string($koneksi, $_POST['Judul']);
        $isiBerita = mysqli_real_escape_string($koneksi, $_POST['Isi_Berita']);
        $tanggalTerbit = mysqli_real_escape_string($koneksi, $_POST['Tanggal_Terbit']);

        $objekBerita = new Berita($koneksi);

        $dataBerita = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Gambar' => $gambar,
            'Judul' => $judul,
            'Isi_Berita' => $isiBerita,
            'Tanggal_Terbit' => $tanggalTerbit,
        );

        $simpanDataBerita = $objekBerita->tambahBerita($dataBerita);

        if ($simpanDataBerita) {
            setPesanKeberhasilan("Berhasil menyimpan data Berita.");
        } else {
            setPesanKesalahan("Gagal menyimpan data Berita.");
        }
        header("Location: $akar_tautan" . "src/admin/pages/berita.php");
        exit;
    } else {
        setPesanKesalahan("Gagal mengunggah file Gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/berita.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/berita.php");
    exit;
}
ob_end_flush();
