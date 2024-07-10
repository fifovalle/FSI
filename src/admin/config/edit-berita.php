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
    $idBerita = filter_input(INPUT_POST, 'ID_Berita', FILTER_SANITIZE_STRING);
    $judulBerita = filter_input(INPUT_POST, 'Judul', FILTER_SANITIZE_STRING);
    $isiBerita = filter_input(INPUT_POST, 'Isi_Berita', FILTER_SANITIZE_STRING);
    $tanggalTerbitBerita = filter_input(INPUT_POST, 'Tanggal_Terbit', FILTER_SANITIZE_STRING);;

    $beritaModel = new Berita($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar']) && ($_FILES['Gambar']['size'] > 0)) {
        $gambarBerita = $_FILES['Gambar'];
        $lokasiFile = $gambarBerita['tmp_name'];
        $ekstensiFile = pathinfo($gambarBerita['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarBerita = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarBerita)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    $beritaLama = $beritaModel->getGambarBeritaById($idBerita);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $beritaLama;
    }

    if (!empty($beritaLama) && $namaFileBaru !== $beritaLama) {
        unlink('../../uploads/' . $beritaLama);
    }

    $dataBerita = array(
        'Judul' => $judulBerita,
        'Isi_Berita' => $isiBerita,
        'Tanggal_Terbit' => $tanggalTerbitBerita,
        'Gambar' => $namaFileBaru
    );

    $updateDataBerita = $beritaModel->perbaruiBerita($idBerita, $dataBerita);

    if ($updateDataBerita) {
        echo json_encode(array("success" => true, "message" => "Data berita berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data berita."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
