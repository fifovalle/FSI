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
    $judulJurnal = mysqli_real_escape_string($koneksi, $_POST['Judul_Jurnal']);
    $linkJurnal = mysqli_real_escape_string($koneksi, $_POST['Link_Jurnal']);
    $pencipta = mysqli_real_escape_string($koneksi, $_POST['Pencipta']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['Tahun']);

    $objekInformatika = new Informatika($koneksi);

    if (empty($judulPenelitian) || empty($linkPenelitian) || empty($tingkatan) || empty($judulJurnal) || empty($linkJurnal) || empty($pencipta) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
        exit;
    }

    $pattern = "/^https?:\/\/.+$/";

    if (!preg_match($pattern, $linkPenelitian)) {
        setPesanKesalahan("Tautan penelitian tidak valid. Harus menggunakan format http atau https.");
        header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
        exit;
    }

    if (!preg_match($pattern, $linkJurnal)) {
        setPesanKesalahan("Tautan jurnal tidak valid. Harus menggunakan format http atau https.");
        header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
        exit;
    }

    $dataInformatika = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Judul_Penelitian" => $judulPenelitian,
        'Link_Penelitian' => $linkPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Jurnal' => $judulJurnal,
        'Link_Jurnal' => $linkJurnal,
        'Pencipta' => $pencipta,
        'Tahun' => $tahun,
    );

    $simpanDataInformatika = $objekInformatika->tambahInformatika($dataInformatika);

    if ($simpanDataInformatika) {
        setPesanKeberhasilan("Berhasil menyimpan data Penelitian Teknik Informatika.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Penelitian Teknik Informatika.");
    }
    header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
    exit;
} else {
    header("Location: " . $akar_tautan . "src/admin/pages/penelitian-teknikinformatika.php");
    exit;
}
ob_end_flush();
