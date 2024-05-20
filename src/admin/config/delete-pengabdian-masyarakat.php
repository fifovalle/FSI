<?php
include 'databases.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $id = intval($id);

    $pengabdianMasyarakatModel = new PengabdianMasyarakat($koneksi);
    $hapusData = $pengabdianMasyarakatModel->hapusPengabdianMasyarakat($id);

    $successMessage = htmlspecialchars("Data produk pengabdian masyarakat berhasil dihapus.");
    $failureMessage = htmlspecialchars("Gagal menghapus data produk pengabdian masyarakat.");
    $errorMessage = htmlspecialchars("Halaman tidak dapat diakses.");

    $responseMessage = $hapusData ? $successMessage : $failureMessage;
    $sessionKey = $hapusData ? 'berhasil' : 'gagal';

    setPesanKeberhasilan($hapusData ? $successMessage : '');
    setPesanKesalahan(!$hapusData ? $failureMessage : '');

    header("Location: $akar_tautan" . "src/admin/pages/pengabdian-masyarakat.php");
    exit();
} else {
    $errorMessage = "Halaman tidak dapat diakses.";
    setPesanKesalahan($errorMessage);

    header("Location: $akar_tautan" . "src/admin/pages/pengabdian-masyarakat.php");
    exit();
}
