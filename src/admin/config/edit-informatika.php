<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPenelitianIF = $_POST['ID_Penelitian_If'] ?? '';
    $judulPenelitian = $_POST['Judul_Penelitian'] ?? '';
    $tautanPenelitian = $_POST['Link_Penelitian'] ?? '';
    $tingkatan = $_POST['Tingkatan'] ?? '';
    $judulJurnal = $_POST['Judul_Journal'] ?? '';
    $tautanJurnal = $_POST['Link_Journal'] ?? '';
    $creator = $_POST['Creator'] ?? '';
    $tahunJurnal = $_POST['Tahun'] ?? '';

    if (!is_numeric($idPenelitianIF) || $idPenelitianIF <= 0) {
        echo json_encode(array("success" => false, "message" => "ID informatika tidak valid."));
        exit;
    }

    $penelitianIF = new Informatika($koneksi);

    $dataPenelitianIF = array(
        'Judul_Penelitian' => $judulPenelitian,
        'Link_Penelitian' => $tautanPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Jurnal' => $judulJurnal,
        'Link_Jurnal' => $tautanJurnal,
        'Pencipta' => $creator,
        'Tahun' => $tahunJurnal
    );

    $updateDataPenelitianIF = $penelitianIF->perbaruiInformatika($idPenelitianIF, $dataPenelitianIF);

    if ($updateDataPenelitianIF) {
        echo json_encode(array("success" => true, "message" => "Data informatika berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data informatika."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
