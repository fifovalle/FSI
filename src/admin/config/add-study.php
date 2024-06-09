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
    $programStudi = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Nama_Prodi']));
    $gambarProdi = $_FILES['Gambar_Prodi'];
    $tautanProdi = mysqli_real_escape_string($koneksi, $_POST['Tautan_Prodi']);

    if (empty($programStudi) || empty($gambarProdi['name'])) {
        setPesanKesalahan("Field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/program-studi.php");
        exit;
    }

    $pattern = "/^https?:\/\/.+$/";

    if (!preg_match($pattern, $tautanProdi)) {
        setPesanKesalahan("Tautan Program Studi tidak valid. Harus menggunakan format http atau https.");
        header("Location: " . $akar_tautan . "src/admin/pages/program-studi.php");
        exit;
    }

    $namaGambarProdi = $gambarProdi['name'];
    $ukuranGambarProdi = $gambarProdi['size'];
    $errorGambarProdi = $gambarProdi['error'];

    $ukuranMaksimal = 2 * 1024 * 1024;
    if ($ukuranGambarProdi > $ukuranMaksimal) {
        setPesanKesalahan("Ukuran gambar terlalu besar. Harus kurang dari 2MB.");
        header("Location: $akar_tautan" . "src/admin/pages/program-studi.php");
        exit;
    }

    $formatYangDisetujui = ['jpg', 'jpeg', 'png', 'gif'];
    $formatGambarProdi = strtolower(pathinfo($namaGambarProdi, PATHINFO_EXTENSION));
    if (!in_array($formatGambarProdi, $formatYangDisetujui)) {
        setPesanKesalahan("Format gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF.");
        header("Location: $akar_tautan" . "src/admin/pages/program-studi.php");
        exit;
    }

    $namaFileBaru = uniqid() . '.' . $formatGambarProdi;
    $lokasiFileBaru = '../../uploads/' . $namaFileBaru;

    if (move_uploaded_file($gambarProdi['tmp_name'], $lokasiFileBaru)) {
        $objekProgramStudi = new ProgramStudi($koneksi);

        $dataProgramStudi = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Nama_Prodi' => $programStudi,
            'Gambar_Prodi' => $namaFileBaru,
            'Tautan_Prodi' => $tautanProdi
        );

        $simpanDataProgramStudi = $objekProgramStudi->tambahProgramStudi($dataProgramStudi);

        if ($simpanDataProgramStudi) {
            setPesanKeberhasilan("Berhasil menyimpan data Program Studi.");
        } else {
            setPesanKesalahan("Gagal menyimpan data Program Studi.");
        }
        header("Location: $akar_tautan" . "src/admin/pages/program-studi.php");
        exit;
    } else {
        setPesanKesalahan("Gagal mengunggah gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/program-studi.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/program-studi.php");
    exit;
}
ob_end_flush();
