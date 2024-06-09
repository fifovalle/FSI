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
    $tautanPenelitian = mysqli_real_escape_string($koneksi, $_POST['Tautan_Penelitian']);
    $tingkatan = mysqli_real_escape_string($koneksi, $_POST['Tingkatan']);
    $judulJournal = mysqli_real_escape_string($koneksi, $_POST['Judul_Journal']);
    $tautanJournal = mysqli_real_escape_string($koneksi, $_POST['Tautan_Journal']);
    $pencipta = mysqli_real_escape_string($koneksi, $_POST['Pencipta']);
    $tahun = mysqli_real_escape_string($koneksi, $_POST['Tahun']);

    if (empty($judulPenelitian) || empty($tautanPenelitian) || empty($tingkatan) || empty($judulJournal) || empty($tautanJournal) || empty($pencipta) || empty($tahun)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/penelitian-magisterkimia.php");
        exit;
    }

    if (!filter_var($tautanPenelitian, FILTER_VALIDATE_URL) || (strpos($tautanPenelitian, 'http://') !== 0 && strpos($tautanPenelitian, 'https://') !== 0)) {
        echo json_encode(array("success" => false, "message" => "Tautan Penelitian harus berupa URL HTTP atau HTTPS yang valid."));
        exit;
    }

    if (!filter_var($tautanJournal, FILTER_VALIDATE_URL) || (strpos($tautanJournal, 'http://') !== 0 && strpos($tautanJournal, 'https://') !== 0)) {
        echo json_encode(array("success" => false, "message" => "Tautan Jurnal harus berupa URL HTTP atau HTTPS yang valid."));
        exit;
    }

    $objekMagisterKimia = new magisterKimia($koneksi);

    $dataMagisterKimia = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Judul_Penelitian" => $judulPenelitian,
        'Tautan_Penelitian' => $tautanPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Journal' => $judulJournal,
        'Tautan_Journal' => $tautanJournal,
        'Pencipta' => $pencipta,
        'Tahun' => $tahun,
    );

    $simpanDataMagisterKimia = $objekMagisterKimia->tambahMagisterKimia($dataMagisterKimia);

    if ($simpanDataMagisterKimia) {
        setPesanKeberhasilan("Berhasil menyimpan data Penelitian Magister Kimia.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Penelitian Magister Kimia.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-magisterkimia.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/penelitian-magisterkimia.php");
    exit;
}
ob_end_flush();
