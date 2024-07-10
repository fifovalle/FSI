<?php
include 'databases.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $id = intval($id);

    $strukturModel = new StrukturOrganisasi($koneksi);
    $hapusData = $strukturModel->hapusStrukturOrganisasi($id);

    $successMessage = htmlspecialchars("Data struktur organisasi berhasil dihapus.");
    $failureMessage = htmlspecialchars("Gagal menghapus data struktur organisasi.");
    $errorMessage = htmlspecialchars("Halaman tidak dapat diakses.");

    $responseMessage = $hapusData ? $successMessage : $failureMessage;

    if ($hapusData) {
        setPesanKeberhasilan($successMessage);
    } else {
        setPesanKesalahan($failureMessage);
    }

    header("Location: $akar_tautan" . "src/admin/pages/struktur-organisasi.php");
    exit();
} else {
    $errorMessage = "Halaman tidak dapat diakses.";
    setPesanKesalahan($errorMessage);

    header("Location: $akar_tautan" . "src/admin/pages/struktur-organisasi.php");
    exit();
}
