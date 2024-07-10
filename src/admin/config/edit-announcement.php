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
    $idPengumuman = filter_input(INPUT_POST, 'ID_Pengumuman', FILTER_SANITIZE_STRING);
    $judulPengumuman = filter_input(INPUT_POST, 'Judul_Pengumuman', FILTER_SANITIZE_STRING);
    $isiPengumuman = filter_input(INPUT_POST, 'Isi_Pengumuman', FILTER_SANITIZE_STRING);

    $namaFileBaru = '';

    if (isset($_FILES['Foto_Pengumuman']) && $_FILES['Foto_Pengumuman']['size'] > 0) {
        $fotoPengumuman = $_FILES['Foto_Pengumuman'];
        $lokasiFile = $fotoPengumuman['tmp_name'];
        $ekstensiFile = pathinfo($fotoPengumuman['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $lokasiFileBaru = '../../uploads/' . $namaFileBaru;

        move_uploaded_file($lokasiFile, $lokasiFileBaru);
    } else {
        $pengumumanModel = new Pengumuman($koneksi);
        $fotoLama = $pengumumanModel->getGambarPengumumanById($idPengumuman);
        $namaFileBaru = $fotoLama;
    }

    $pengumumanModel = new Pengumuman($koneksi);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $fotoLama;
    }

    if (!empty($fotoLama) && $namaFileBaru !== $fotoLama) {
        unlink('../../uploads/' . $fotoLama);
    }


    $dataPengumuman = array(
        'Judul_Pengumuman' => $judulPengumuman,
        'Isi_Pengumuman' => $isiPengumuman,
        'Foto_Pengumuman' => $namaFileBaru
    );

    $updateDataPengumuman = $pengumumanModel->perbaruiPengumuman($idPengumuman, $dataPengumuman);

    if ($updateDataPengumuman) {
        echo json_encode(array("success" => true, "message" => "Data pengumuman berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data pengumuman."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
