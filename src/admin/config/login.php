<?php

ob_start();

include 'databases.php';

$adminDatabase = new Admin($koneksi);

if (isset($_POST['Masuk'])) {
    $emailAdmin = $_POST['Email_Admin'];
    $kataSandi = $_POST['Kata_Sandi'];
    $captchaInput = $_POST['Captcha'];

    if (empty($emailAdmin) || empty($kataSandi) || empty($captchaInput)) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/login.php");
        exit();
    }

    if (isset($_SESSION['captcha']) && $_SESSION['captcha'] === $captchaInput) {
        $admin = $adminDatabase->autentikasiAdmin($emailAdmin, $kataSandi);

        if ($admin === null) {
            setPesanKesalahan("Maaf, email atau kata sandi yang Anda masukkan tidak ditemukan. Silakan hubungi admin untuk mendaftar.");
            header("Location: $akar_tautan" . "src/admin/pages/login.php");
            exit();
        }

        if ($admin['Status_Verifikasi_Email'] !== 'Terverifikasi') {
            setPesanKesalahan("Maaf, akun Anda belum terverifikasi.");
            header("Location: $akar_tautan" . "src/admin/pages/login.php");
            exit();
        }

        $_SESSION['ID_Admin'] = htmlspecialchars($admin['ID_Admin']);
        $_SESSION['Foto_Admin'] = htmlspecialchars($admin['Foto_Admin']);
        $_SESSION['Nama_Admin'] = htmlspecialchars($admin['Nama_Admin']);

        setPesanKeberhasilan("Selamat datang, " . $_SESSION['Nama_Admin'] . "!");
        header("Location: $akar_tautan" . "public/index.php");
        exit();
    } else {
        setPesanKesalahan("Maaf, CAPTCHA yang Anda masukkan salah.");
        header("Location: $akar_tautan" . "src/admin/pages/login.php");
        exit();
    }
}

ob_end_flush();
