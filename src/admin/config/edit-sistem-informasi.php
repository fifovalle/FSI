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
    $idSistemInformasi = filter_input(INPUT_POST, 'ID_Sistem_Informasi', FILTER_SANITIZE_STRING);
    $judulPenelitian = filter_input(INPUT_POST, 'Judul_Penelitian', FILTER_SANITIZE_STRING);
    $tautanPenelitian = filter_input(INPUT_POST, 'Link_Penelitian', FILTER_SANITIZE_URL);
    $tingkatan = filter_input(INPUT_POST, 'Tingkatan', FILTER_SANITIZE_STRING);
    $judulJurnal = filter_input(INPUT_POST, 'Judul_Journal', FILTER_SANITIZE_STRING);
    $tautanJurnal = filter_input(INPUT_POST, 'Link_Journal', FILTER_SANITIZE_URL);
    $pencipta = filter_input(INPUT_POST, 'Creator', FILTER_SANITIZE_STRING);
    $tahunJurnal = filter_input(INPUT_POST, 'Tahun', FILTER_SANITIZE_STRING);



    if (!is_numeric($idSistemInformasi) || $idSistemInformasi <= 0) {
        echo json_encode(array("success" => false, "message" => "ID sistem informasi tidak valid."));
        exit;
    }

    if (!filter_var($tautanPenelitian, FILTER_VALIDATE_URL) || (strpos($tautanPenelitian, 'http://') !== 0 && strpos($tautanPenelitian, 'https://') !== 0)) {
        echo json_encode(array("success" => false, "message" => "Tautan Penelitian harus berupa URL HTTP atau HTTPS yang valid."));
        exit;
    }

    if (!filter_var($tautanJurnal, FILTER_VALIDATE_URL) || (strpos($tautanJurnal, 'http://') !== 0 && strpos($tautanJurnal, 'https://') !== 0)) {
        echo json_encode(array("success" => false, "message" => "Tautan Jurnal harus berupa URL HTTP atau HTTPS yang valid."));
        exit;
    }


    $penelitianSistemInformasi = new SistemInformasi($koneksi);

    $datapenelitianSistemInformasi = array(
        'Judul_Penelitian' => $judulPenelitian,
        'Tautan_Penelitian' => $tautanPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Jurnal' => $judulJurnal,
        'Tautan_Jurnal' => $tautanJurnal,
        'Pencipta' => $creator,
        'Tahun' => $tahunJurnal
    );

    $updateDataPenelitianSistemInformasi = $penelitianSistemInformasi->perbaruiSistemInformasi($idSistemInformasi, $datapenelitianSistemInformasi);

    if ($updateDataPenelitianSistemInformasi) {
        echo json_encode(array("success" => true, "message" => "Data sistem informasi berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data sistem informasi."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
