<?php
include 'databases.php';

$carouselModel = new Carousel($koneksi);

$carouselID = isset($_GET['carousel_id']) ? $_GET['carousel_id'] : null;
$dataCarousel = $carouselModel->tampilkanDataCarousel($carouselID);

$carouselDitemukan = null;

foreach ($dataCarousel as $carousel) {
    $carouselDitemukan = $carousel['ID_Carousel'] == $carouselID ? $carousel : null;
    if ($carouselDitemukan) {
        break;
    }
}

echo json_encode($carouselDitemukan);
