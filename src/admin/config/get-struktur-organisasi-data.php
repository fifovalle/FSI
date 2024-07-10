<?php
include 'databases.php';

$strukturOrganisasiModel = new StrukturOrganisasi($koneksi);

$idStrukturOrganisasi = isset($_GET['struktur_organisasi_id']) ? $_GET['struktur_organisasi_id'] : null;
$dataStrukturOrganisasi = $strukturOrganisasiModel->tampilkanDataStrukturOrganisasi($idStrukturOrganisasi);

$strukturOrganisasiDitemukan = null;

foreach ($dataStrukturOrganisasi as $struktur) {
    $strukturOrganisasiDitemukan = $struktur['ID_Organisasi'] == $idStrukturOrganisasi ? $struktur : null;
    if ($strukturOrganisasiDitemukan) {
        break;
    }
}

echo json_encode($strukturOrganisasiDitemukan);
