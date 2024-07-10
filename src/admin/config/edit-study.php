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
    $idProdi = filter_input(INPUT_POST, 'ID_Prodi', FILTER_SANITIZE_STRING);
    $namaProdi = filter_input(INPUT_POST, 'Nama_Prodi', FILTER_SANITIZE_STRING);
    $tautanProdi = filter_input(INPUT_POST, 'Tautan_Prodi', FILTER_SANITIZE_URL);



    $prodiModel = new ProgramStudi($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar_Prodi']) && ($_FILES['Gambar_Prodi']['size'] > 0)) {
        $gambarProdi = $_FILES['Gambar_Prodi'];
        $lokasiFile = $gambarProdi['tmp_name'];
        $ekstensiFile = pathinfo($gambarProdi['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarProdi = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarProdi)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    if (!filter_var($tautanProdi, FILTER_VALIDATE_URL) || strpos($tautanProdi, 'https://') !== 0) {
        echo json_encode(array("success" => false, "message" => "Tautan Program Studi harus berupa URL HTTPS yang valid."));
        exit;
    }


    $prodiLama = $prodiModel->getProgramStudiById($idProdi);


    if (empty($namaFileBaru)) {
        $namaFileBaru = $prodiLama;
    }

    if (!empty($prodiLama) && $namaFileBaru !== $prodiLama) {
        unlink('../../uploads/' . $prodiLama);
    }

    $dataProdi = array(
        'Nama_Prodi' => $namaProdi,
        'Gambar_Prodi' => $namaFileBaru,
        'Tautan_Prodi' => $tautanProdi
    );

    $updateDataProdi = $prodiModel->perbaruiProgramStudi($idProdi, $dataProdi);

    if ($updateDataProdi) {
        echo json_encode(array("success" => true, "message" => "Data program studi berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data program studi."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
