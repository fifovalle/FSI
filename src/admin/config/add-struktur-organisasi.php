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

    $namaFile = $_FILES['Foto_Dosen_Organisasi']['name'];
    $lokasiFile = $_FILES['Foto_Dosen_Organisasi']['tmp_name'];
    $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileUnik = uniqid('dosen_') . '.' . $ekstensiFile;
    $tujuanFile = '../../uploads/' . $namaFileUnik;

    if (!empty($namaFile) && !empty($lokasiFile)) {
        list($width, $height) = getimagesize($lokasiFile);
        $targetWidth = 300;
        $targetHeight = 300;

        if ($width < $targetWidth || $height < $targetHeight) {
            setPesanKesalahan("Ukuran gambar terlalu kecil. Harus minimal 300x300 px.");
            header("Location: $akar_tautan" . "src/admin/pages/struktur-organisasi.php");
            exit;
        }

        $sourceImage = imagecreatefromjpeg($lokasiFile);
        $croppedImage = imagecropauto($sourceImage);

        if ($croppedImage !== false) {
            imagejpeg($croppedImage, $tujuanFile);
            imagedestroy($croppedImage);
        } else {
            setPesanKesalahan("Gagal melakukan cropping foto.");
            header("Location: $akar_tautan" . "src/admin/pages/struktur-organisasi.php");
            exit;
        }

        $fotoDosen = $namaFileUnik;
        $namaDosen = mysqli_real_escape_string($koneksi, $_POST['Nama_Dosen_Organisasi']);
        $jabatanDosen = mysqli_real_escape_string($koneksi, $_POST['Jabatan_Dosen_Organisasi']);
        $kasubagOrganisasi = mysqli_real_escape_string($koneksi, $_POST['Kasubag_Organisasi']);

        $objekStruktur = new StrukturOrganisasi($koneksi);

        $dataStruktur = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Foto_Dosen_Organisasi' => $fotoDosen,
            'Nama_Dosen_Organisasi' => $namaDosen,
            'Jabatan_Dosen_Organisasi' => $jabatanDosen,
            'Kasubag_Organisasi' => $kasubagOrganisasi,
        );

        $simpanDataStruktur = $objekStruktur->tambahStrukturOrganisasi($dataStruktur);

        if ($simpanDataStruktur) {
            setPesanKeberhasilan("Berhasil menyimpan data struktur organisasi.");
        } else {
            setPesanKesalahan("Gagal menyimpan data struktur organisasi.");
        }
        header("Location: $akar_tautan" . "src/admin/pages/struktur-organisasi.php");
        exit;
    } else {
        setPesanKesalahan("Foto dosen tidak diunggah. Silakan unggah foto dosen.");
        header("Location: $akar_tautan" . "src/admin/pages/struktur-organisasi.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/struktur-organisasi.php");
    exit;
}
ob_end_flush();
