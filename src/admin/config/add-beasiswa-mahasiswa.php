<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    $gambar = '';
    $pesanKesalahan = '';

    if (isset($_FILES['Gambar']) && $_FILES['Gambar']['error'] === UPLOAD_ERR_OK) {
        $gambarFile = $_FILES['Gambar'];
        $namaGambar = mysqli_real_escape_string($koneksi, htmlspecialchars($gambarFile['name']));
        $gambarTemp = $gambarFile['tmp_name'];
        $ukuranGambar = $gambarFile['size'];
        $errorGambar = $gambarFile['error'];

        $ukuranMaksimal = 2 * 1024 * 1024; // 2MB
        $apakahUnggahBerhasil = ($errorGambar === 0 && !empty($namaGambar)) && ($ukuranGambar <= $ukuranMaksimal);
        $pesanKesalahan .= (!$apakahUnggahBerhasil && empty($pesanKesalahan)) ? "Gagal mengupload gambar atau gambar tidak diunggah atau ukuran melebihi batas maksimal 2MB." : '';

        $formatYangDisetujui = ['jpg', 'jpeg', 'png'];
        $formatGambar = strtolower(pathinfo($namaGambar, PATHINFO_EXTENSION));
        $apakahFormatDisetujui = in_array($formatGambar, $formatYangDisetujui);
        $pesanKesalahan .= (!$apakahFormatDisetujui && empty($pesanKesalahan)) ? "Format gambar harus berupa JPG, JPEG, atau PNG." : '';

        $namaGambarBaru = $apakahFormatDisetujui ? uniqid() . '.' . $formatGambar : '';
        $tujuanGambar = $apakahFormatDisetujui ? '../../uploads/' . $namaGambarBaru : '';

        if ($apakahUnggahBerhasil && $apakahFormatDisetujui && move_uploaded_file($gambarTemp, $tujuanGambar)) {
            $gambar = $namaGambarBaru;
        } else {
            setPesanKesalahan($pesanKesalahan);
            header("Location: $akar_tautan" . "src/admin/pages/prestasi-mahasiswa.php");
            exit;
        }
    }
    $namaPenerima = mysqli_real_escape_string($koneksi, $_POST['Nama_Penerima']);
    $namaBeasiswa = mysqli_real_escape_string($koneksi, $_POST['Nama_Beasiswa']);
    $durasiBeasiswa = mysqli_real_escape_string($koneksi, $_POST['Durasi_Beasiswa']);
    $linkInstagram = mysqli_real_escape_string($koneksi, $_POST['Link_Instagram']);
    $linkWebsite = mysqli_real_escape_string($koneksi, $_POST['Link_Website']);

    $objekBeasiswaMahasiswa = new beasiswaMahasiswa($koneksi);

    $dataBeasiswaMahasiswa = array(
        "ID_Admin" => $_SESSION['ID_Admin'],
        "Gambar" => $gambar,
        "Nama_Penerima" => $namaPenerima,
        "Nama_Beasiswa" => $namaBeasiswa,
        'Durasi_Beasiswa' => $durasiBeasiswa,
        'Link_Instagram' => $linkInstagram,
        'Link_Website' => $linkWebsite,
    );

    $simpanDataBeasiswaMahasiswa = $objekBeasiswaMahasiswa->tambahBeasiswaMahasiswa($dataBeasiswaMahasiswa);

    if ($simpanDataBeasiswaMahasiswa) {
        setPesanKeberhasilan("Berhasil menyimpan data Beasiswa Mahasiswa.");
    } else {
        setPesanKesalahan("Gagal menyimpan data Beasiswa Mahasiswa.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/beasiswa-mahasiswa.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/beasiswa-mahasiswa.php");
    exit;
}
ob_end_flush();
