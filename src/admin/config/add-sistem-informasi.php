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
    $judulPenelitian = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Judul_Penelitian']));
    $linkPenelitian = mysqli_real_escape_string($koneksi, $_POST['Link_Penelitian']);
    $tingkatan = mysqli_real_escape_string($koneksi, $_POST['Tingkatan']);
    $judulJurnal = mysqli_real_escape_string($koneksi, $_POST['Judul_Journal']);
    $linkJurnal = mysqli_real_escape_string($koneksi, $_POST['Link_Journal']);
    $pencipta = mysqli_real_escape_string($koneksi, $_POST['Pencipta']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['Tahun']);

    if (empty($judulPenelitian) || empty($linkPenelitian) || empty($tingkatan) || empty($judulJurnal) || empty($linkJurnal) || empty($pencipta) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/penelitian-sisteminformasi.php");
        exit;
    }

    if (!filter_var($linkPenelitian, FILTER_VALIDATE_URL) || (strpos($linkPenelitian, 'http://') !== 0 && strpos($linkPenelitian, 'https://') !== 0)) {
        echo json_encode(array("success" => false, "message" => "Tautan Penelitian harus berupa URL HTTP atau HTTPS yang valid."));
        exit;
    }

    if (!filter_var($linkJurnal, FILTER_VALIDATE_URL) || (strpos($linkJurnal, 'http://') !== 0 && strpos($linkJurnal, 'https://') !== 0)) {
        echo json_encode(array("success" => false, "message" => "Tautan Jurnal harus berupa URL HTTP atau HTTPS yang valid."));
        exit;
    }

    $objekSistemInformasi = new SistemInformasi($koneksi);

    $dataSistemInformasi = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Judul_Penelitian" => $judulPenelitian,
        'Tautan_Penelitian' => $linkPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Jurnal' => $judulJurnal,
        'Tautan_Jurnal' => $linkJurnal,
        'Pencipta' => $pencipta,
        'Tahun' => $tahun,
    );

    $simpanDataSistemInformasi = $objekSistemInformasi->tambahSistemInformasi($dataSistemInformasi);

    if ($simpanDataSistemInformasi) {
        setPesanKeberhasilan("Berhasil menyimpan data Penelitian Sistem Informasi.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Penelitian Sistem Informasi.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-sisteminformasi.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-sisteminformasi.php");
    exit;
}
ob_end_flush();
