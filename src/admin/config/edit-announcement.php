<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idPengumuman = $_POST['ID_Pengumuman'] ?? '';
    $judulPengumuman = $_POST['Judul_Pengumuman'] ?? '';
    $isiPengumuman = $_POST['Isi_Pengumuman'] ?? '';

    $namaFileBaru = '';

    if (isset($_FILES['Foto_Pengumuman']) && $_FILES['Foto_Pengumuman']['size'] > 0) {
        $fotoPengumuman = $_FILES['Foto_Pengumuman'];
        $lokasiFile = $fotoPengumuman['tmp_name'];
        $ekstensiFile = pathinfo($fotoPengumuman['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $lokasiFileBaru = '../../uploads/' . $namaFileBaru;

        move_uploaded_file($lokasiFile, $lokasiFileBaru);
    } else {
        $pengumumanModel = new Pengumuman($koneksi);
        $fotoLama = $pengumumanModel->getGambarPengumumanById($idPengumuman);
        $namaFileBaru = $fotoLama;
    }

    $pengumumanModel = new Pengumuman($koneksi);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $fotoLama;
    }

    if (!empty($fotoLama) && $namaFileBaru !== $fotoLama) {
        unlink('../../uploads/' . $fotoLama);
    }


    $dataPengumuman = array(
        'Judul_Pengumuman' => $judulPengumuman,
        'Isi_Pengumuman' => $isiPengumuman,
        'Foto_Pengumuman' => $namaFileBaru
    );

    $updateDataPengumuman = $pengumumanModel->perbaruiPengumuman($idPengumuman, $dataPengumuman);

    if ($updateDataPengumuman) {
        echo json_encode(array("success" => true, "message" => "Data pengumuman berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data pengumuman."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
