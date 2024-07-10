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
    $idPrestasi = filter_input(INPUT_POST, 'ID_Prestasi', FILTER_SANITIZE_STRING);
    $namaMahasiswa = filter_input(INPUT_POST, 'Nama_Mahasiswa', FILTER_SANITIZE_STRING);
    $namaKegiatan = filter_input(INPUT_POST, 'Nama_Kegiatan', FILTER_SANITIZE_STRING);
    $pencapaian = filter_input(INPUT_POST, 'Pencapaian', FILTER_SANITIZE_STRING);
    $tahunPencapaian = filter_input(INPUT_POST, 'Tahun_Pencapaian', FILTER_SANITIZE_STRING);


    $prestasiMahasiswaModel = new prestasiMahasiswa($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar_Prestasi']) && ($_FILES['Gambar_Prestasi']['size'] > 0)) {
        $gambarPrestasi = $_FILES['Gambar_Prestasi'];
        $lokasiFile = $gambarPrestasi['tmp_name'];
        $ekstensiFile = pathinfo($gambarPrestasi['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarPrestasi = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarPrestasi)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    $prestasiLama = $prestasiMahasiswaModel->getGambarPrestasiById($idPrestasi);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $prestasiLama;
    }

    if (!empty($prestasiLama) && $namaFileBaru !== $prestasiLama) {
        unlink('../../uploads/' . $prestasiLama);
    }

    $dataPrestasi = array(
        'Nama_Mahasiswa' => $namaMahasiswa,
        'Kegiatan' => $namaKegiatan,
        'Pencapaian' => $pencapaian,
        'Tahun_Pencapaian' => $tahunPencapaian,
        'Gambar' => $namaFileBaru
    );

    $updateDataPrestasi = $prestasiMahasiswaModel->perbaruiPrestasiMahasiswa($idPrestasi, $dataPrestasi);

    if ($updateDataPrestasi) {
        echo json_encode(array("success" => true, "message" => "Data prestasi berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data prestasi."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
ob_end_flush();
