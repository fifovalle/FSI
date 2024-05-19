<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idCarousel = $_POST['ID_Carousel'] ?? '';
    $judulCarousel = $_POST['Judul'] ?? '';
    $deskripsiCarousel = $_POST['Deskripsi'] ?? '';

    $carouselModel = new Carousel($koneksi);

    $namaFileBaru = '';

    if (isset($_FILES['Gambar']) && ($_FILES['Gambar']['size'] > 0)) {
        $gambarCarousel = $_FILES['Gambar'];
        $lokasiFile = $gambarCarousel['tmp_name'];
        $ekstensiFile = pathinfo($gambarCarousel['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file gambar tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $tujuanGambarCarousel = "../../uploads/" . $namaFileBaru;

        if (!move_uploaded_file($lokasiFile, $tujuanGambarCarousel)) {
            echo json_encode(array("success" => false, "message" => "Gagal mengunggah gambar baru."));
            exit;
        }
    }

    $carouselLama = $carouselModel->getGambarCarouselById($idCarousel);

    if (empty($namaFileBaru)) {
        $namaFileBaru = $carouselLama;
    }

    if (!empty($carouselLama) && $namaFileBaru !== $carouselLama) {
        unlink('../../uploads/' . $carouselLama);
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
