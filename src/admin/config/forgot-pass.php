<?php

use PHPMailer\PHPMailer\PHPMailer;

include 'databases.php';
require '../../../vendor/phpmailer/src/Exception.php';
require '../../../vendor/phpmailer/src/PHPMailer.php';
require '../../../vendor/phpmailer/src/SMTP.php';

if (isset($_POST['Kirim'])) {
    $email = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Email_Forgot']));

    if (empty($email)) {
        setPesanKesalahan("Email tidak boleh kosong.");
        header("Location: $akar_tautan" . "src/admin/pages/forgot-password.php");
        exit;
    }

    $obyekAdmin = new Admin($koneksi);
    $adminData = $obyekAdmin->getAdminByEmail($email);

    if ($adminData) {
        $namaDepan = $adminData['Nama_Admin'];
        $emailAdmin = $adminData['Email_Admin'];
        do {
            $tokenBaru = random_int(10000000, 99999999);
            $tokenSudahAda = $obyekAdmin->getAdminByToken($tokenBaru);
        } while ($tokenSudahAda);

        require '../../../vendor/autoload.php';
        $mail = new PHPMailer(true);

        $obyekAdmin->updateTokenByEmail($email, $tokenBaru);

        include 'send-forgot-password-email.php';

        setPesanKeberhasilan("Email berhasil dikirim.");
        header("Location: $akar_tautan" . "src/admin/pages/forgot-password.php");
        exit;
    } else {
        setPesanKesalahan("Email tidak terdaftar.");
        header("Location: $akar_tautan" . "src/admin/pages/forgot-password.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/forgot-password.php");
    exit;
}
