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

    $idStrukturOrganisasi = filter_input(INPUT_POST, 'ID_Organisasi', FILTER_SANITIZE_STRING);
    $namaDosenOrganisasi = filter_input(INPUT_POST, 'Nama_Dosen_Organisasi', FILTER_SANITIZE_STRING);
    $jabatanDosenOrganisasi = filter_input(INPUT_POST, 'Jabatan_Dosen_Organisasi', FILTER_SANITIZE_STRING);
    $kasubagOrganisasi = filter_input(INPUT_POST, 'Kasubag_Organisasi', FILTER_SANITIZE_STRING);

    $strukturOrganisasiModel = new StrukturOrganisasi($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Foto_Dosen_Organisasi']) && ($_FILES['Foto_Dosen_Organisasi']['size'] > 0)) {
        $gambarStrukturOrganisasi = $_FILES['Foto_Dosen_Organisasi'];
        $lokasiFile = $gambarStrukturOrganisasi['tmp_name'];
        $ekstensiFile = pathinfo($gambarStrukturOrganisasi['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarStrukturOrganisasi = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarStrukturOrganisasi)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    $strukturOrganisasiLama = $strukturOrganisasiModel->getGambarStrukturOrganisasiById($idStrukturOrganisasi);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $strukturOrganisasiLama;
    }

    if (!empty($strukturOrganisasiLama) && $namaFileBaru !== $strukturOrganisasiLama) {
        unlink('../../uploads/' . $strukturOrganisasiLama);
    }

    $dataStrukturOrganisasi = array(
        'Foto_Dosen_Organisasi' => $namaFileBaru,
        'Nama_Dosen_Organisasi' => $namaDosenOrganisasi,
        'Jabatan_Dosen_Organisasi' => $jabatanDosenOrganisasi,
        'Kasubag_Organisasi' => $kasubagOrganisasi
    );

    $updateDataStrukturOrganisasi = $strukturOrganisasiModel->perbaruiStrukturOrganisasi($idStrukturOrganisasi, $dataStrukturOrganisasi);

    if ($updateDataStrukturOrganisasi) {
        echo json_encode(array("success" => true, "message" => "Data struktur organisasi berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data struktur organisasi."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
