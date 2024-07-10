<?php
include 'databases.php';
ob_start();

function containsXSS($input)
{
    $xss_patterns = [
        "/<script\b[^>]*>(.*?)<\/script>/is",
        "/<img\b[^>]*src[\s]*=[\s]*[\"]*javascript:/i",
        "/<iframe\b[^>]*>(.*?)<\/iframe>/is",
        "/<link\b[^>]*href[\s]*=[\s]*[\"]*javascript:/i",
        "/<object\b[^>]*>(.*?)<\/object>/is",
        "/on[a-zA-Z]+\s*=\s*\"[^\"]*\"/i",
        "/on[a-zA-Z]+\s*=\s*\"[^\"]*\"/i",
        "/<script\b[^>]*>[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/i",
        "/<a\b[^>]*href\s*=\s*(?:\"|')(?:javascript:|.*?\"javascript:).*?(?:\"|')/i",
        "/<embed\b[^>]*>(.*?)<\/embed>/is",
        "/<applet\b[^>]*>(.*?)<\/applet>/is",
        "/<!--.*?-->/",
        "/(<script\b[^>]*>(.*?)<\/script>|<img\b[^>]*src[\s]*=[\s]*[\"]*javascript:|<iframe\b[^>]*>(.*?)<\/iframe>|<link\b[^>]*href[\s]*=[\s]*[\"]*javascript:|<object\b[^>]*>(.*?)<\/object>|on[a-zA-Z]+\s*=\s*\"[^\"]*\"|<[^>]*(>|$)(?:<|>)+|<[^>]*script\s*.*?(?:>|$)|<![^>]*-->|eval\s*\((.*?)\)|setTimeout\s*\((.*?)\)|<[^>]*\bstyle\s*=\s*[\"'][^\"']*[;{][^\"']*['\"]|<meta[^>]*http-equiv=[\"']?refresh[\"']?[^>]*url=|<[^>]*src\s*=\s*\"[^>]*\"[^>]*>|expression\s*\((.*?)\))/i"
    ];

    foreach ($xss_patterns as $pattern) {
        if (preg_match($pattern, $input)) {
            return true;
        }
    }

    return false;
}

if (isset($_POST['Simpan'])) {
    require_once '../../../vendor/ezyang/htmlpurifier/library/HTMLPurifier.auto.php';
    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);
    $idAdmin = $_SESSION['ID_Admin'];
    $namaAdmin = filter_input(INPUT_POST, 'Nama_Admin', FILTER_SANITIZE_STRING);
    $emailAdmin = filter_input(INPUT_POST, 'Email_Admin', FILTER_SANITIZE_EMAIL);
    $kataSandi = filter_input(INPUT_POST, 'Kata_Sandi', FILTER_SANITIZE_STRING);
    $konfirmasiKataSandi = filter_input(INPUT_POST, 'Konfirmasi_Kata_Sandi', FILTER_SANITIZE_STRING);

    $pesanKesalahan = '';

    if (empty($namaAdmin) || empty($emailAdmin) || empty($kataSandi) || empty($konfirmasiKataSandi)) {
        $pesanKesalahan .= "Semua bidang kecuali foto harus diisi. ";
    }

    $emailAdmin = filter_var($emailAdmin, FILTER_VALIDATE_EMAIL);
    if (!$emailAdmin) {
        echo json_encode(array("success" => false, "message" => "Format email tidak valid."));
        exit;
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
ob_end_flush();
