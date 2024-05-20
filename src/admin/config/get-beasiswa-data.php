<?php
include 'databases.php';

$beasiswaMahasiswaModel = new beasiswaMahasiswa($koneksi);

$beasiswaID = isset($_GET['beasiswa_id']) ? $_GET['beasiswa_id'] : null;
$dataBeasiswa = $beasiswaMahasiswaModel->tampilkanDataBeasiswaMahasiswa($beasiswaID);

$beasiswaDitemukan = null;

foreach ($dataBeasiswa as $beasiswa) {
    $beasiswaDitemukan = $beasiswa['ID_Beasiswa'] == $beasiswaID ? $beasiswa : null;
    if ($beasiswaDitemukan) {
        break;
    }
}

echo json_encode($beasiswaDitemukan);
