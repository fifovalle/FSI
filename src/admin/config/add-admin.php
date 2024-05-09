<?php

include 'databases.php';

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['Simpan'])) {
    $fotoAdmin = $_FILES['Foto_Admin'];
    $namaAdmin = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Nama_Admin']));
    $jenisKelaminAdmin = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Jenis_Kelamin_Admin']));
    $emailAdmin = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Email_Admin']));
    $kataSandi = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Kata_Sandi']));
    $konfirmasiKataSandi = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['Konfirmasi_Kata_Sandi']));
    $obyekAdmin = new Admin($koneksi);
    do {
        $token = random_int(10000000, 99999999);
        $tokenSudahAda = $obyekAdmin->getAdminByToken($token);
    } while ($tokenSudahAda);

    $pesanKesalahan = '';

    if (empty($namaAdmin) || empty($emailAdmin) || empty($kataSandi) || empty($konfirmasiKataSandi) || empty($jenisKelaminAdmin)) {
        $pesanKesalahan .= "Semua bidang harus diisi. ";
    }

    $panjangKataSandi = strlen($kataSandi) >= 8;
    $persyaratanKataSandi = preg_match('/[A-Z]/', $kataSandi) && preg_match('/[a-z]/', $kataSandi) && preg_match('/[0-9]/', $kataSandi) && preg_match('/[^A-Za-z0-9]/', $kataSandi);
    $kataSandiYangValid = $panjangKataSandi && $persyaratanKataSandi;
    $pesanKesalahan .= (!$kataSandiYangValid && empty($pesanKesalahan)) ? "Kata sandi harus memiliki setidaknya 8 karakter dan mengandung minimal satu huruf besar, satu huruf kecil, satu angka, dan satu simbol." : '';

    $kecocokanKataSandi = $kataSandi === $konfirmasiKataSandi;
    $pesanKesalahan .= (!$kecocokanKataSandi && empty($pesanKesalahan)) ? "Kata sandi dan konfirmasi kata sandi harus sama." : '';

    if (!filter_var($emailAdmin, FILTER_VALIDATE_EMAIL)) {
        $pesanKesalahan .= "Format email tidak valid. ";
    }

    if (!empty($fotoAdmin['name'])) {
        $namaFotoAdmin = mysqli_real_escape_string($koneksi, htmlspecialchars($fotoAdmin['name']));
        $fotoAdminTemp = $fotoAdmin['tmp_name'];
        $ukuranFotoAdmin = $fotoAdmin['size'];
        $errorFotoAdmin = $fotoAdmin['error'];

        $tujuanFotoAdmin = '';
        $ukuranMaksimal = 2 * 1024 * 1024;

        $apakahUnggahBerhasil = ($errorFotoAdmin === 0 && !empty($namaFotoAdmin)) && ($ukuranFotoAdmin <= $ukuranMaksimal);
        $pesanKesalahan .= (!$apakahUnggahBerhasil && empty($pesanKesalahan)) ? "Gagal mengupload foto admin atau foto tidak diunggah atau ukuran melebihi batas maksimal 2MB." : '';

        $formatYangDisetujui = ['jpg', 'jpeg', 'png'];
        $formatFoto = strtolower(pathinfo($namaFotoAdmin, PATHINFO_EXTENSION));
        $apakahFormatDisetujui = in_array($formatFoto, $formatYangDisetujui);
        $pesanKesalahan .= (!$apakahFormatDisetujui && empty($pesanKesalahan)) ? "Format foto harus berupa JPG, JPEG, atau PNG." : '';

        $namaFotoAdminBaru = $apakahFormatDisetujui ? uniqid() . '.' . $formatFoto : '';

        $tujuanFotoAdmin = $apakahFormatDisetujui ? '../../uploads/' . $namaFotoAdminBaru : '';

        $apakahBerhasilDipindahkan = $apakahFormatDisetujui ? move_uploaded_file($fotoAdminTemp, $tujuanFotoAdmin) : false;
        $pesanKesalahan .= (!$apakahBerhasilDipindahkan && empty($pesanKesalahan)) ? "Gagal mengupload foto admin." : '';
    } else {
        $namaFotoAdminBaru = '../../uploads/default.jpeg';
    }

    if (!empty($pesanKesalahan)) {
        setPesanKesalahan($pesanKesalahan);
        header("Location: $akar_tautan" . "src/admin/pages/admin.php");
        exit;
    }

    if ($obyekAdmin->cekEmailSudahAda($emailAdmin)) {
        setPesanKesalahan("Email yang dimasukkan sudah terdaftar.");
        header("Location: $akar_tautan" . "src/admin/pages/admin.php");
        exit;
    }

    $hashKataSandi = password_hash($kataSandi, PASSWORD_DEFAULT);

    $dataAdmin = array(
        'Foto_Admin' => $namaFotoAdminBaru,
        'Nama_Admin' => $namaAdmin,
        'Email_Admin' => $emailAdmin,
        'Kata_Sandi' => $hashKataSandi,
        'Konfirmasi_Kata_Sandi' => $konfirmasiKataSandi,
        'Jenis_Kelamin_Admin' => $jenisKelaminAdmin,
        'Status_Verifikasi_Email' => "Belum Terverifikasi",
        'Token_Verifikasi' => $token
    );

    $simpanDataAdmin = $obyekAdmin->tambahAdmin($dataAdmin);

    if ($simpanDataAdmin) {
        require '../../../vendor/autoload.php';
        $mail = new PHPMailer(true);
        include 'send-verification-email.php';
    } else {
        setPesanKesalahan("Gagal menyimpan data admin.");
    }
    header("Location: $akar_tautan" . "src/admin/pages/admin.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/admin.php");
    exit;
}