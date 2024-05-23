<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idSistemInformasi = $_POST['ID_Sistem_Informasi'] ?? '';
    $judulPenelitian = $_POST['Judul_Penelitian'] ?? '';
    $tautanPenelitian = $_POST['Link_Penelitian'] ?? '';
    $tingkatan = $_POST['Tingkatan'] ?? '';
    $judulJurnal = $_POST['Judul_Journal'] ?? '';
    $tautanJurnal = $_POST['Link_Journal'] ?? '';
    $creator = $_POST['Creator'] ?? '';
    $tahunJurnal = $_POST['Tahun'] ?? '';

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
