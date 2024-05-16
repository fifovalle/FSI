<?php
include 'databases.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idAgenda = $_POST['ID_Agenda'] ?? '';
    $judulAgenda = $_POST['Judul_Agenda'] ?? '';
    $isiAgenda = $_POST['Isi_Agenda'] ?? '';

    $namaFileBaru = '';

    if (isset($_FILES['Gambar_Agenda']) && $_FILES['Gambar_Agenda']['size'] > 0) {
        $gambarAgenda = $_FILES['Gambar_Agenda'];
        $lokasiFile = $gambarAgenda['tmp_name'];
        $ekstensiFile = pathinfo($gambarAgenda['name'], PATHINFO_EXTENSION);

        if (!in_array($ekstensiFile, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo json_encode(array("success" => false, "message" => "Ekstensi file tidak valid. Harus berupa JPG, JPEG, PNG, atau GIF."));
            exit;
        }

        $namaFileBaru = uniqid() . '.' . $ekstensiFile;
        $lokasiFileBaru = '../../uploads/' . $namaFileBaru;

        move_uploaded_file($lokasiFile, $lokasiFileBaru);
    } else {
        $agendaModel = new Agenda($koneksi);
        $gambarLama = $agendaModel->getGambarAgendaById($idAgenda);
        $namaFileBaru = $gambarLama;
    }

    $agendaModel = new Agenda($koneksi);

    $dataAgenda = array(
        'Judul_Agenda' => $judulAgenda,
        'Isi_Agenda' => $isiAgenda,
        'Gambar_Agenda' => $namaFileBaru
    );

    $updateDataAgenda = $agendaModel->perbaruiAgenda($idAgenda, $dataAgenda);

    if ($updateDataAgenda) {
        echo json_encode(array("success" => true, "message" => "Data agenda berhasil diperbarui."));
        exit;
    } else {
        echo json_encode(array("success" => false, "message" => "Gagal memperbarui data agenda."));
        exit;
    }
} else {
    echo json_encode(array("success" => false, "message" => "Metode request tidak valid."));
    exit;
}
