<?php
include 'databases.php';

$kimiaModel = new Kimia($koneksi);

$kimiaID = isset($_GET['kimia_id']) ? $_GET['kimia_id'] : null;
$dataKimia = $kimiaModel->tampilkanDataKimia($kimiaID);

$kimiaDitemukan = null;

foreach ($dataKimia as $kimia) {
    $kimiaDitemukan = $kimia['ID_Penelitian_Kimia'] == $kimiaID ? $kimia : null;
    if ($kimiaDitemukan) {
        break;
    }
}

echo json_encode($kimiaDitemukan);
