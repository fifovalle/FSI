<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idBerita = $_POST['ID_Berita'] ?? '';
    $judulBerita = $_POST['Judul'] ?? '';
    $isiBerita = $_POST['Isi_Berita'] ?? '';
    $tanggalTerbitBerita = $_POST['Tanggal_Terbit'] ?? '';

    if (!isset($_FILES['Gambar'])) {
        echo json_encode(array("success" => false, "message" => "Gambar berita tidak tersedia."));
        exit;
    }

    $gambarBerita = $_FILES['Gambar'];
    $namaFileBaru = uniqid() . '_' . $gambarBerita['name'];
    $lokasiFile = '../uploads/' . $namaFileBaru;

    $beritaModel = new Berita($koneksi);

    $gambarLama = $beritaModel->getGambarBeritaById($idBerita);

    if (!empty($gambarLama)) {
        unlink('../uploads/' . $gambarLama);
    }

    if (!move_uploaded_file($gambarBerita['tmp_name'], $lokasiFile)) {
        echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar berita."));
        exit;
    }

    $dataBerita = array(
        'Judul' => $judulBerita,
        'Isi_Berita' => $isiBerita,
        'Tanggal_Terbit' => $tanggalTerbitBerita,
        'Gambar' => $namaFileBaru
    );

    $updateDataBerita = $beritaModel->perbaruiBerita($idBerita, $dataBerita);

    if ($updateDataBerita) {
        echo json_encode(array("success" => true, "message" => "Data berita berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data berita."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
