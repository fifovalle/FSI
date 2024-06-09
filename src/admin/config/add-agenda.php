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
    if (empty($_POST['Judul_Agenda']) || empty($_POST['Isi_Agenda'])) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    }

    $namaFile = $_FILES['Gambar_Agenda']['name'];
    $lokasiFile = $_FILES['Gambar_Agenda']['tmp_name'];

    if (empty($namaFile)) {
        setPesanKesalahan("Gambar tidak diunggah. Silakan upload gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    }

    $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileUnik = uniqid('agenda_') . '.' . $ekstensiFile;
    $tujuanFile = '../../uploads/' . $namaFileUnik;

    if (move_uploaded_file($lokasiFile, $tujuanFile)) {
        $gambarAgenda = $namaFileUnik;
        $judulAgenda = mysqli_real_escape_string($koneksi, $_POST['Judul_Agenda']);
        $isiAgenda = mysqli_real_escape_string($koneksi, $_POST['Isi_Agenda']);

        $objekAgenda = new Agenda($koneksi);

        $dataAgenda = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Gambar_Agenda' => $gambarAgenda,
            'Judul_Agenda' => $judulAgenda,
            'Isi_Agenda' => $isiAgenda,
        );

        $simpanDataAgenda = $objekAgenda->tambahAgenda($dataAgenda);

        if ($simpanDataAgenda) {
            setPesanKeberhasilan("Berhasil menyimpan data Agenda.");
        } else {
            setPesanKesalahan("Gagal menyimpan data Agenda.");
        }
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    } else {
        setPesanKesalahan("Gagal mengunggah file Gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
    exit;
}
ob_end_flush();
