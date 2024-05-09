<?php
include 'databases.php';

if (isset($_POST['Simpan'])) {
    $namaFile = $_FILES['Foto_Mahasiswa']['name'];
    $lokasiFile = $_FILES['Foto_Mahasiswa']['tmp_name'];
    $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileUnik = uniqid('mahasiswa_') . '.' . $ekstensiFile;
    $tujuanFile = '../../uploads/' . $namaFileUnik;

    if (empty($_POST['Nama_Mahasiswa']) || empty($_POST['Kesan_Mahasiswa']) || empty($_POST['Tanggal_Testimoni'])) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
        exit;
    }

    if (!empty($namaFile) && !empty($lokasiFile)) {
        if (move_uploaded_file($lokasiFile, $tujuanFile)) {
            $fotoMahasiswa = $namaFileUnik;
            $namaMahasiswa = mysqli_real_escape_string($koneksi, $_POST['Nama_Mahasiswa']);
            $kesanMahasiswa = mysqli_real_escape_string($koneksi, $_POST['Kesan_Mahasiswa']);
            $tanggalTestimoni = mysqli_real_escape_string($koneksi, $_POST['Tanggal_Testimoni']);

            $objekTestimoni = new Testimoni($koneksi);

            $dataTestimoni = array(
                "ID_Admin" => $_SESSION['ID_Admin'],
                'Foto_Mahasiswa' => $fotoMahasiswa,
                'Nama_Mahasiswa' => $namaMahasiswa,
                'Kesan_Mahasiswa' => $kesanMahasiswa,
                'Tanggal_Testimoni' => $tanggalTestimoni,
            );

            $simpanDataTestimoni = $objekTestimoni->tambahTestimoni($dataTestimoni);

            if ($simpanDataTestimoni) {
                setPesanKeberhasilan("Berhasil menyimpan data Testimoni.");
            } else {
                setPesanKesalahan("Gagal menyimpan data Testimoni.");
            }
            header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
            exit;
        } else {
            setPesanKesalahan("Gagal mengunggah foto mahasiswa.");
            header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
            exit;
        }
    } else {
        setPesanKesalahan("Foto mahasiswa tidak diunggah. Silakan unggah  foto mahasiswa.");
        header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/testimoni.php");
    exit;
}
