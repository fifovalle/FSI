<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCarousel = $_POST['ID_Carousel'] ?? '';
    $judulCarousel = $_POST['Judul'] ?? '';
    $deskripsiCarousel = $_POST['Deskripsi'] ?? '';

    if (!isset($_FILES['Gambar'])) {
        echo json_encode(array("success" => false, "message" => "Gambar carousel tidak tersedia."));
        exit;
    }

    $gambarCarousel = $_FILES['Gambar'];
    $namaFileBaru = uniqid() . '_' . $gambarCarousel['name'];
    $lokasiFile = '../uploads/' . $namaFileBaru;

    $carouselModel = new Carousel($koneksi);

    $gambarLama = $carouselModel->getGambarCarouselById($idCarousel);

    if (!empty($gambarLama)) {
        unlink('../uploads/' . $gambarLama);
    }

    if (!move_uploaded_file($gambarCarousel['tmp_name'], $lokasiFile)) {
        echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar carousel."));
        exit;
    }

    $dataCarousel = array(
        'Judul' => $judulCarousel,
        'Deskripsi' => $deskripsiCarousel,
        'Gambar' => $namaFileBaru
    );

    $updateDataCarousel = $carouselModel->perbaruiCarousel($idCarousel, $dataCarousel);

    if ($updateDataCarousel) {
        echo json_encode(array("success" => true, "message" => "Data carousel berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data carousel."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
