<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPenelitianKimia = $_POST['ID_Penelitian_Kimia'] ?? '';
    $judulPenelitian = $_POST['Judul_Penelitian'] ?? '';
    $tautanPenelitian = $_POST['Link_Penelitian'] ?? '';
    $tingkatan = $_POST['Tingkatan'] ?? '';
    $judulJurnal = $_POST['Judul_Journal'] ?? '';
    $tautanJurnal = $_POST['Link_Journal'] ?? '';
    $creator = $_POST['Creator'] ?? '';
    $tahunJurnal = $_POST['Tahun'] ?? '';

    $penelitianKimia = new Kimia($koneksi);

    if (!is_numeric($idPenelitianKimia) || $idPenelitianKimia <= 0) {
        echo json_encode(array("success" => false, "message" => "ID kimia tidak valid."));
        exit;
    }

    $pattern = "/^https:\/\/.+$/";

    if (!preg_match($pattern, $tautanPenelitian)) {
        echo json_encode(array("success" => false, "message" => "Tautan Penelitian tidak valid. Harus menggunakan format https."));
        exit;
    }

    if (!preg_match($pattern, $tautanJurnal)) {
        echo json_encode(array("success" => false, "message" => "Tautan Jurnal tidak valid. Harus menggunakan format https."));
        exit;
    }

    $dataPenelitianKimia = array(
        'Judul_Penelitian' => $judulPenelitian,
        'Tautan_Penelitian' => $tautanPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Jurnal' => $judulJurnal,
        'Tautan_Jurnal' => $tautanJurnal,
        'Pencipta' => $creator,
        'Tahun' => $tahunJurnal
    );

    $updateDataPenelitianKimia = $penelitianKimia->perbaruiKimia($idPenelitianKimia, $dataPenelitianKimia);

    if ($updateDataPenelitianKimia) {
        echo json_encode(array("success" => true, "message" => "Data kimia berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data kimia."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
