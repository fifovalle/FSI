<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idBerita = $_POST['ID_Berita'] ?? '';
    $judulBerita = $_POST['Judul'] ?? '';
    $isiBerita = $_POST['Isi_Berita'] ?? '';
    $tanggalTerbitBerita = $_POST['Tanggal_Terbit'] ?? '';

    $beritaModel = new Berita($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar']) && ($_FILES['Gambar']['size'] > 0)) {
        $gambarBerita = $_FILES['Gambar'];
        $lokasiFile = $gambarBerita['tmp_name'];
        $ekstensiFile = pathinfo($gambarBerita['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarBerita = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarBerita)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    $beritaLama = $beritaModel->getGambarBeritaById($idBerita);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $beritaLama;
    }

    if (!empty($beritaLama) && $namaFileBaru !== $beritaLama) {
        unlink('../../uploads/' . $beritaLama);
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
