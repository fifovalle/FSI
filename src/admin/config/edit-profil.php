<?php
include 'databases.php';

if (isset($_POST['Simpan'])) {
    $idAdmin = $_SESSION['ID_Admin'];
    $namaAdmin = $_POST['Nama_Admin'];
    $emailAdmin = $_POST['Email_Admin'];
    $kataSandi = $_POST['Kata_Sandi'];
    $konfirmasiKataSandi = $_POST['Konfirmasi_Kata_Sandi'];

    $pesanKesalahan = '';

    if (empty($namaAdmin) || empty($emailAdmin) || empty($kataSandi) || empty($konfirmasiKataSandi)) {
        $pesanKesalahan .= "Semua bidang kecuali foto harus diisi. ";
    }

    $panjangKataSandi = strlen($kataSandi) >= 8;
    $persyaratanKataSandi = preg_match('/[A-Z]/', $kataSandi) && preg_match('/[a-z]/', $kataSandi) && preg_match('/[0-9]/', $kataSandi) && preg_match('/[^A-Za-z0-9]/', $kataSandi);
    $kataSandiYangValid = $panjangKataSandi && $persyaratanKataSandi;
    $pesanKesalahan .= (!$kataSandiYangValid && empty($pesanKesalahan)) ? "Kata sandi harus memiliki setidaknya 8 karakter dan mengandung minimal satu huruf besar, satu huruf kecil, satu angka, dan satu simbol." : '';

    $kecocokanKataSandi = $kataSandi === $konfirmasiKataSandi;
    $pesanKesalahan .= (!$kecocokanKataSandi && empty($pesanKesalahan)) ? "Kata sandi dan konfirmasi kata sandi harus sama." : '';

    if (!empty($pesanKesalahan)) {
        setPesanKesalahan($pesanKesalahan);
        header("Location: $akar_tautan" . "src/admin/pages/profile.php");
        exit;
    }

    if (isset($_FILES['Foto_Admin']) && $_FILES['Foto_Admin']['error'] === UPLOAD_ERR_OK) {
        $namaFoto = $_FILES['Foto_Admin']['name'];
        $lokasiFoto = $_FILES['Foto_Admin']['tmp_name'];
        $formatFoto = pathinfo($namaFoto, PATHINFO_EXTENSION);
        $namaFotoAdminBaru = uniqid() . '.' . $formatFoto;
        $folderTujuan = '../../uploads/';
        $fotoAdmin = $folderTujuan . $namaFotoAdminBaru;

        $obyekAdmin = new Admin($koneksi);
        $adminSebelumnya = $obyekAdmin->getAdminById($idAdmin);
        $fotoLama = $adminSebelumnya['Foto_Admin'];

        if (!empty($fotoLama) && file_exists($fotoLama)) {
            unlink($fotoLama);
        }

        if (!move_uploaded_file($lokasiFoto, $fotoAdmin)) {
            setPesanKesalahan("Gagal mengunggah foto.");
            header("Location: $akar_tautan" . "src/admin/pages/profile.php");
            exit;
        }
    } else {
        $obyekAdmin = new Admin($koneksi);
        $adminSebelumnya = $obyekAdmin->getAdminById($idAdmin);
        $fotoAdmin = $adminSebelumnya['Foto_Admin'];

        if (!empty($fotoAdmin)) {
            $lokasiFotoLama = '../../uploads/' . $fotoAdmin;
            if (file_exists($lokasiFotoLama)) {
                if (!unlink($lokasiFotoLama)) {
                    setPesanKesalahan("Gagal menghapus foto lama.");
                }
            }
        }
    }

    $hashKataSandi = password_hash($kataSandi, PASSWORD_DEFAULT);

    $dataAdmin = array(
        'ID_Admin' => $idAdmin,
        'Foto_Admin' => $namaFotoAdminBaru,
        'Nama_Admin' => $namaAdmin,
        'Email_Admin' => $emailAdmin,
        'Kata_Sandi' => $hashKataSandi,
        'Konfirmasi_Kata_Sandi' => $konfirmasiKataSandi,
        'Jenis_Kelamin_Admin' => ''
    );

    $statusPerbarui = $obyekAdmin->perbaruiProfile($idAdmin, $dataAdmin);

    if ($statusPerbarui) {
        setPesanKeberhasilan("Data admin berhasil diperbarui.");
    } else {
        setPesanKesalahan("Gagal memperbarui data admin.");
    }

    header("Location: $akar_tautan" . "src/admin/pages/profile.php");
    exit;
} else {
    header("Location: $akar_tautan" . "src/admin/pages/profile.php");
    exit;
}
