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
    $idBeasiswa = filter_input(INPUT_POST, 'ID_Beasiswa', FILTER_SANITIZE_STRING);
    $namaPenerima = filter_input(INPUT_POST, 'Nama_Penerima', FILTER_SANITIZE_STRING);
    $namaBeasiswa = filter_input(INPUT_POST, 'Nama_Beasiswa', FILTER_SANITIZE_STRING);
    $durasiBeasiswa = filter_input(INPUT_POST, 'Durasi_Beasiswa', FILTER_SANITIZE_STRING);
    $Instagram = filter_input(INPUT_POST, 'Instagram', FILTER_SANITIZE_STRING);
    $Website = filter_input(INPUT_POST, 'Website', FILTER_SANITIZE_STRING);

    $beasiswaMahasiswaModel = new beasiswaMahasiswa($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar_Beasiswa']) && ($_FILES['Gambar_Beasiswa']['size'] > 0)) {
        $gambarBeasiswa = $_FILES['Gambar_Beasiswa'];
        $lokasiFile = $gambarBeasiswa['tmp_name'];
        $ekstensiFile = pathinfo($gambarBeasiswa['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarBeasiswa = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarBeasiswa)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    $beasiswaLama = $beasiswaMahasiswaModel->getGambarBeasiswaById($idBeasiswa);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $beasiswaLama;
    }

    if (!empty($beasiswaLama) && $namaFileBaru !== $beasiswaLama) {
        unlink('../../uploads/' . $beasiswaLama);
    }

    $dataBeasiswa = array(
        'Nama_Penerima' => $namaPenerima,
        'Nama_Beasiswa' => $namaBeasiswa,
        'Durasi_Beasiswa' => $durasiBeasiswa,
        'Link_Instagram' => $Instagram,
        'Link_Website' => $Website,
        'Gambar' => $namaFileBaru
    );

    $updateDataBeasiswa = $beasiswaMahasiswaModel->perbaruiBeasiswaMahasiswa($idBeasiswa, $dataBeasiswa);

    if ($updateDataBeasiswa) {
        echo json_encode(array("success" => true, "message" => "Data beasiswa berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data beasiswa."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
