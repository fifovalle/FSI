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
