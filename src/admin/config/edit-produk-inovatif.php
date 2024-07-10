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
    $idProduk = filter_input(INPUT_POST, 'ID_Produk', FILTER_SANITIZE_STRING);
    $judulInovasi = filter_input(INPUT_POST, 'Judul_Inovasi', FILTER_SANITIZE_STRING);
    $tautanInovasi = filter_input(INPUT_POST, 'Link_Inovasi', FILTER_SANITIZE_URL);
    $leader = filter_input(INPUT_POST, 'Leader', FILTER_SANITIZE_STRING);
    $judulEvent = filter_input(INPUT_POST, 'Judul_Event', FILTER_SANITIZE_STRING);
    $personil = filter_input(INPUT_POST, 'Personil', FILTER_SANITIZE_STRING);
    $tahun = filter_input(INPUT_POST, 'Tahun', FILTER_SANITIZE_STRING);


    if (!is_numeric($idProduk) || $idProduk <= 0) {
        echo json_encode(array("success" => false, "message" => "ID produk tidak valid."));
        exit;
    }

    $pattern = "/^https:\/\/.+$/";

    if (!preg_match($pattern, $tautanInovasi)) {
        echo json_encode(array("success" => false, "message" => "Tautan Produk Inovatif tidak valid. Harus menggunakan format https."));
        exit;
    }

    $produkInovatif = new ProdukInovatif($koneksi);

    $dataProdukInovatif = array(
        'Judul_Inovasi' => $judulInovasi,
        'Tautan_Inovasi' => $tautanInovasi,
        'Leader' => $leader,
        'Event' => $judulEvent,
        'Personil' => $personil,
        'Tahun' => $tahun
    );

    $updateDataProdukInovatif = $produkInovatif->perbaruiProdukInovatif($idProduk, $dataProdukInovatif);

    if ($updateDataProdukInovatif) {
        echo json_encode(array("success" => true, "message" => "Data produk inovatif berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data produk inovatif."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
