<?php
include 'databases.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $id = intval($id);

    $beasiswaMahasiswaModel = new beasiswaMahasiswa($koneksi);
    $hapusData = $beasiswaMahasiswaModel->hapusBeasiswaMahasiswa($id);

    $successMessage = htmlspecialchars("Data Beasiswa Mahasiswa berhasil dihapus.");
    $failureMessage = htmlspecialchars("Gagal menghapus data Beasiswa Mahasiswa.");
    $errorMessage = htmlspecialchars("Halaman tidak dapat diakses.");

    $responseMessage = $hapusData ? $successMessage : $failureMessage;
    $sessionKey = $hapusData ? 'berhasil' : 'gagal';

    setPesanKeberhasilan($hapusData ? $successMessage : '');
    setPesanKesalahan(!$hapusData ? $failureMessage : '');

    header("Location: $akar_tautan" . "src/admin/pages/beasiswa-mahasiswa.php");
    exit();
} else {
    $errorMessage = "Halaman tidak dapat diakses.";
    setPesanKesalahan($errorMessage);

    header("Location: $akar_tautan" . "src/admin/pages/beasiswa-mahasiswa.php");
    exit();
}
