<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPenelitianMagisterKimia = $_POST['ID_Penelitian_Magister_Kimia'] ?? '';
    $judulPenelitian = $_POST['Judul_Penelitian'] ?? '';
    $tautanPenelitian = $_POST['Tautan_Penelitian'] ?? '';
    $tingkatan = $_POST['Tingkatan'] ?? '';
    $judulJurnal = $_POST['Judul_Journal'] ?? '';
    $tautanJurnal = $_POST['Tautan_Journal'] ?? '';
    $pencipta = $_POST['Pencipta'] ?? '';
    $tahunJurnal = $_POST['Tahun'] ?? '';

    if (!is_numeric($idPenelitianMagisterKimia) || $idPenelitianMagisterKimia <= 0) {
        echo json_encode(array("success" => false, "message" => "ID Magister Kimia tidak valid."));
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

    $penelitianMagisterkimia = new magisterKimia($koneksi);

    $dataPenelitianMagisterKimia = array(
        'Judul_Penelitian' => $judulPenelitian,
        'Tautan_Penelitian' => $tautanPenelitian,
        'Tingkatan' => $tingkatan,
        'Judul_Journal' => $judulJurnal,
        'Tautan_Journal' => $tautanJurnal,
        'Pencipta' => $pencipta,
        'Tahun' => $tahunJurnal
    );

    $updateDataPenelitianMagisterKimia = $penelitianMagisterkimia->perbaruiMagisterKimia($idPenelitianMagisterKimia, $dataPenelitianMagisterKimia);

    if ($updateDataPenelitianMagisterKimia) {
        echo json_encode(array("success" => true, "message" => "Data Magister Kimia berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data Magister Kimia."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
