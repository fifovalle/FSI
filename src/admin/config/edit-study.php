<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idProdi = $_POST['ID_Prodi'] ?? '';
    $namaProdi = $_POST['Nama_Prodi'] ?? '';
    $tautanProdi = $_POST['Tautan_Prodi'] ?? '';


    $prodiModel = new ProgramStudi($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar_Prodi']) && ($_FILES['Gambar_Prodi']['size'] > 0)) {
        $gambarProdi = $_FILES['Gambar_Prodi'];
        $lokasiFile = $gambarProdi['tmp_name'];
        $ekstensiFile = pathinfo($gambarProdi['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarProdi = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarProdi)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    if (!filter_var($tautanProdi, FILTER_VALIDATE_URL) || strpos($tautanProdi, 'https://') !== 0) {
        echo json_encode(array("success" => false, "message" => "Tautan Program Studi harus berupa URL HTTPS yang valid."));
        exit;
    }


    $prodiLama = $prodiModel->getProgramStudiById($idProdi);


    if (empty($namaFileBaru)) {
        $namaFileBaru = $prodiLama;
    }

    if (!empty($prodiLama) && $namaFileBaru !== $prodiLama) {
        unlink('../../uploads/' . $prodiLama);
    }

    $dataProdi = array(
        'Nama_Prodi' => $namaProdi,
        'Gambar_Prodi' => $namaFileBaru,
        'Tautan_Prodi' => $tautanProdi
    );

    $updateDataProdi = $prodiModel->perbaruiProgramStudi($idProdi, $dataProdi);

    if ($updateDataProdi) {
        echo json_encode(array("success" => true, "message" => "Data program studi berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data program studi."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
