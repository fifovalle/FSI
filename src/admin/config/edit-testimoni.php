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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../../vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $idTestimoni = filter_input(INPUT_POST, 'ID_Testimoni', FILTER_SANITIZE_STRING) ?? '';
    $namaMahasiswa = filter_input(INPUT_POST, 'Nama_Mahasiswa', FILTER_SANITIZE_STRING) ?? '';
    $kesanMahasiswa = filter_input(INPUT_POST, 'Kesan_Mahasiswa', FILTER_SANITIZE_STRING) ?? '';
    $tanggalTestimoni = filter_input(INPUT_POST, 'Tanggal_Testimoni', FILTER_SANITIZE_STRING) ?? '';

    $namaFileBaru = '';

    if (isset($_FILES['Foto_Mahasiswa']) && $_FILES['Foto_Mahasiswa']['size'] > 0) {
        $fotoMahasiswa = $_FILES['Foto_Mahasiswa'];
        $lokasiFile = $fotoMahasiswa['tmp_name'];
        $ekstensiFile = pathinfo($fotoMahasiswa['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        list($width, $height) = getimagesize($lokasiFile);
        $targetWidth = 300;
        $targetHeight = 300;
        if ($width < $targetWidth || $height < $targetHeight) {
            echo json_encode(array("success" => false, "message" => "Ukuran gambar terlalu kecil. Harus minimal 300x300 px."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $lokasiFileBaru = '../../uploads/' . $namaFileBaru;

        $sourceImage = imagecreatefromstring(file_get_contents($lokasiFile));
        $croppedImage = imagecropauto($sourceImage);
        if ($croppedImage === false || !imagejpeg($croppedImage, $lokasiFileBaru)) {
            echo json_encode(array("success" => false, "message" => "Gagal menyimpan foto mahasiswa yang sudah di-crop."));
            exit;
        }
        imagedestroy($sourceImage);
        imagedestroy($croppedImage);
        unlink($lokasiFile);
    }

    $testimoniModel = new Testimoni($koneksi);

    $fotoLama = $testimoniModel->getFotoMahasiswaById($idTestimoni);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $fotoLama;
    }

    if (!empty($fotoLama) && $namaFileBaru !== $fotoLama) {
        unlink('../../uploads/' . $fotoLama);
    }

    $dataTestimoni = array(
        'Nama_Mahasiswa' => $namaMahasiswa,
        'Kesan_Mahasiswa' => $kesanMahasiswa,
        'Tanggal_Testimoni' => $tanggalTestimoni,
        'Foto_Mahasiswa' => $namaFileBaru
    );

    $updateDataTestimoni = $testimoniModel->perbaruiTestimoni($idTestimoni, $dataTestimoni);

    if ($updateDataTestimoni) {
        echo json_encode(array("success" => true, "message" => "Data testimoni berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data testimoni."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
