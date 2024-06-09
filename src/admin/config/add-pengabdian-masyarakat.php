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
