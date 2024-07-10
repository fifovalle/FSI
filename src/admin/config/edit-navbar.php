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
    $idNavbar = filter_input(INPUT_POST, 'ID_Navbar', FILTER_SANITIZE_STRING);
    $namaBarNavigasi = filter_input(INPUT_POST, 'Daftar_Nama', FILTER_SANITIZE_STRING);
    $tautanBarNavigasi = filter_input(INPUT_POST, 'Tautan', FILTER_SANITIZE_URL);
    $kategori = filter_input(INPUT_POST, 'Kategori', FILTER_SANITIZE_STRING);
    $subKategori = filter_input(INPUT_POST, 'Sub_Kategori', FILTER_SANITIZE_STRING);

    $navbarModel = new Navbar($koneksi);

    if ($subKategori === "" || $subKategori === "Pilih Sub Kategori") {
        $subKategori = NULL;
    }

    if (!is_numeric($idNavbar) || $idNavbar <= 0) {
        echo json_encode(array("success" => false, "message" => "ID navbar tidak valid."));
        exit;
    }

    $pattern = "/^https?:\/\/.+$/";

    if (!preg_match($pattern, $tautanBarNavigasi)) {
        echo json_encode(array("success" => false, "message" => "Tautan navbar tidak valid. Harus menggunakan format http atau https."));
        exit;
    }

    $dataNavbar = array(
        'Daftar_Nama' => $namaBarNavigasi,
        'Tautan' => $tautanBarNavigasi,
        'Kategori' => $kategori,
        'Sub_Kategori' => $subKategori
    );

    $subcategories = $navbarModel->getSubcategories($kategori);

    $updateDataNavbar = $navbarModel->perbaruiNavbar($idNavbar, $dataNavbar);

    if ($updateDataNavbar) {
        echo json_encode(array("success" => true, "message" => "Data navbar berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data navbar."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
