<?php
include 'databases.php';

if (isset($_POST['Simpan'])) {
    $judul = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Judul']));
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['Deskripsi']);

    if (empty($judul) || empty($deskripsi) || !isset($_FILES['Gambar']) || $_FILES['Gambar']['error'] !== UPLOAD_ERR_OK) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/pages/carousel.php");
        exit;
    }

    $direktoriTujuan = '../uploads/';
    $namaFileBaru = uniqid()  . $_FILES['Gambar']['name'];

    if (move_uploaded_file($_FILES['Gambar']['tmp_name'], $direktoriTujuan . $namaFileBaru)) {
        $gambar = $direktoriTujuan . $namaFileBaru;

        $objekCarousel = new Carousel($koneksi);
        $dataCarousel = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Judul' => $judul,
            'Deskripsi' => $deskripsi,
            'Gambar' => $namaFileBaru,
        );

        $simpanDataCarousel = $objekCarousel->tambahDataCarousel($dataCarousel);

        if ($simpanDataCarousel) {
            setPesanKeberhasilan("Data Carousel berhasil ditambahkan.");
            header("Location: $akar_tautan" . "src/pages/carousel.php");
            exit();
        } else {
            setPesanKesalahan("Gagal menambahkan data carousel.");
            header("Location: $akar_tautan" . "src/pages/carousel.php");
            exit;
        }
    } else {
        setPesanKesalahan("Gagal mengunggah gambar.");
        header("Location: $akar_tautan" . "src/pages/carousel.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/pages/carousel.php");
    exit;
}
