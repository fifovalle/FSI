<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
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
    require_once '../../../vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $namaFile = $_FILES['Foto_Mahasiswa']['name'];
    $lokasiFile = $_FILES['Foto_Mahasiswa']['tmp_name'];
    $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileUnik = uniqid('mahasiswa_') . '.' . $ekstensiFile;
    $tujuanFile = '../../uploads/' . $namaFileUnik;

    if (empty($_POST['Nama_Mahasiswa']) || empty($_POST['Kesan_Mahasiswa']) || empty($_POST['Tanggal_Testimoni'])) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
        exit;
    }

    if (!empty($namaFile) && !empty($lokasiFile)) {
        list($width, $height) = getimagesize($lokasiFile);
        $targetWidth = 300;
        $targetHeight = 300;

        if ($width < $targetWidth || $height < $targetHeight) {
            setPesanKesalahan("Ukuran gambar terlalu kecil. Harus minimal 300x300 px.");
            header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
            exit;
        }

        $sourceImage = imagecreatefromjpeg($lokasiFile);
        $croppedImage = imagecropauto($sourceImage);

        if ($croppedImage !== false) {
            imagejpeg($croppedImage, $tujuanFile);
            imagedestroy($croppedImage);
        } else {
            setPesanKesalahan("Gagal melakukan cropping foto.");
            header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
            exit;
        }

        $fotoMahasiswa = $namaFileUnik;
        $namaMahasiswa = mysqli_real_escape_string($koneksi, $_POST['Nama_Mahasiswa']);
        $kesanMahasiswa = mysqli_real_escape_string($koneksi, $_POST['Kesan_Mahasiswa']);
        $tanggalTestimoni = mysqli_real_escape_string($koneksi, $_POST['Tanggal_Testimoni']);

        $objekTestimoni = new Testimoni($koneksi);

        $dataTestimoni = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Foto_Mahasiswa' => $fotoMahasiswa,
            'Nama_Mahasiswa' => $namaMahasiswa,
            'Kesan_Mahasiswa' => $kesanMahasiswa,
            'Tanggal_Testimoni' => $tanggalTestimoni,
        );

        $simpanDataTestimoni = $objekTestimoni->tambahTestimoni($dataTestimoni);

        if ($simpanDataTestimoni) {
            setPesanKeberhasilan("Berhasil menyimpan data Testimoni.");
        } else {
            setPesanKesalahan("Gagal menyimpan data Testimoni.");
        }
        header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
        exit;
    } else {
        setPesanKesalahan("Foto mahasiswa tidak diunggah. Silakan unggah foto mahasiswa.");
        header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
    exit;
}
ob_end_flush();
