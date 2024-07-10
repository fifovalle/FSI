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
    $idAgenda = filter_input(INPUT_POST, 'ID_Agenda', FILTER_SANITIZE_STRING);
    $judulAgenda = filter_input(INPUT_POST, 'Judul_Agenda', FILTER_SANITIZE_STRING);
    $isiAgenda = filter_input(INPUT_POST, 'Isi_Agenda', FILTER_SANITIZE_STRING);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar_Agenda']) && $_FILES['Gambar_Agenda']['size'] > 0) {
        $gambarAgenda = $_FILES['Gambar_Agenda'];
        $lokasiFile = $gambarAgenda['tmp_name'];
        $ekstensiFile = pathinfo($gambarAgenda['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $lokasiFileBaru = '../../uploads/' . $namaFileBaru;

        move_uploaded_file($lokasiFile, $lokasiFileBaru);
    } else {
        $agendaModel = new Agenda($koneksi);
        $gambarLama = $agendaModel->getGambarAgendaById($idAgenda);
        $namaFileBaru = $gambarLama;
    }

    $agendaModel = new Agenda($koneksi);

    $dataAgenda = array(
        'Judul_Agenda' => $judulAgenda,
        'Isi_Agenda' => $isiAgenda,
        'Gambar_Agenda' => $namaFileBaru
    );

    $updateDataAgenda = $agendaModel->perbaruiAgenda($idAgenda, $dataAgenda);

    if ($updateDataAgenda) {
        echo json_encode(array("success" => true, "message" => "Data agenda berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data agenda."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
