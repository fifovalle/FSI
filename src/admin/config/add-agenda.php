<?php
include 'databases.php';
ob_start();

if (isset($_POST['Simpan'])) {
    if (empty($_POST['Judul_Agenda']) || empty($_POST['Isi_Agenda'])) {
        setPesanKesalahan("Semua field harus diisi.");
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    }

    $namaFile = $_FILES['Gambar_Agenda']['name'];
    $lokasiFile = $_FILES['Gambar_Agenda']['tmp_name'];

    if (empty($namaFile)) {
        setPesanKesalahan("Gambar tidak diunggah. Silakan upload gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    }

    $ekstensiFile = pathinfo($namaFile, PATHINFO_EXTENSION);
    $namaFileUnik = uniqid('agenda_') . '.' . $ekstensiFile;
    $tujuanFile = '../../uploads/' . $namaFileUnik;

    if (move_uploaded_file($lokasiFile, $tujuanFile)) {
        $gambarAgenda = $namaFileUnik;
        $judulAgenda = mysqli_real_escape_string($koneksi, $_POST['Judul_Agenda']);
        $isiAgenda = mysqli_real_escape_string($koneksi, $_POST['Isi_Agenda']);

        $objekAgenda = new Agenda($koneksi);

        $dataAgenda = array(
            "ID_Admin" => $_SESSION['ID_Admin'],
            'Gambar_Agenda' => $gambarAgenda,
            'Judul_Agenda' => $judulAgenda,
            'Isi_Agenda' => $isiAgenda,
        );

        $simpanDataAgenda = $objekAgenda->tambahAgenda($dataAgenda);

        if ($simpanDataAgenda) {
            setPesanKeberhasilan("Berhasil menyimpan data Agenda.");
        } else {
            setPesanKesalahan("Gagal menyimpan data Agenda.");
        }
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    } else {
        setPesanKesalahan("Gagal mengunggah file Gambar.");
        header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
        exit;
    }
} else {
    header("Location: $akar_tautan" . "src/admin/pages/agenda.php");
    exit;
}
ob_end_flush();