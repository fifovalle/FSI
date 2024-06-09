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
    $judul = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Judul']));
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['Deskripsi']);

    if (empty($judul) || empty($deskripsi) || !isset($_FILES['Gambar']) || $_FILES['Gambar']['error'] !== UPLOAD_ERR_OK) {
        if ($_FILES['Gambar']['error'] === UPLOAD_ERR_NO_FILE) {
            setPesanKesalahan("Gambar tidak di-upload. Silakan upload gambar.");
        } else {
            setPesanKesalahan("Semua field harus diisi.");
        }
        header("Location: $akar_tautan" . "src/admin/pages/carousel.php");
        exit;
    }

    $direktoriTujuan = '../../uploads/';
    $namaFileBaru = uniqid()  . $_FILES['Gambar']['name'];

    if (move_uploaded_file($_FILES['Gambar']['tmp_name'], $direktoriTujuan . $namaFileBaru)) {
        $gambar = $direktoriTujuan . $namaFileBaru;

        $objekCarousel = new Carousel($koneksi);
        $dataCarousel = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Judul' => $judul,
            'Deskripsi' => $deskripsi,
            'Gambar' => $namaFileBaru,
        );

        $simpanDataCarousel = $objekCarousel->tambahDataCarousel($dataCarousel);

        if ($simpanDataCarousel) {
            setPesanKeberhasilan("Data Carousel berhasil ditambahkan.");
            header("Location: $akar_tautan" . "src/admin/pages/carousel.php");
            exit();
        } else {
            setPesanKesalahan("Gagal menambahkan data carousel.");
            header("Location: $akar_tautan" . "src/admin/pages/carousel.php");
            exit;
        }
    } else {
        setPesanKesalahan("Gagal mengunggah gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/carousel.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/carousel.php");
    exit;
}
ob_end_flush();
