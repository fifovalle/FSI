<?php
include 'databases.php';

$magisterKimiaModel = new magisterKimia($koneksi);

$magisterKimiaID = isset($_GET['magister_kimia_id']) ? $_GET['magister_kimia_id'] : null;
$dataMagisterKimia = $magisterKimiaModel->tampilkanDataMagisterKimia($magisterKimiaID);

$magisterKimiaDitemukan = null;

foreach ($dataMagisterKimia as $magisterKimia) {
    $magisterKimiaDitemukan = $magisterKimia['ID_Penelitian_Magister_Kimia'] == $magisterKimiaID ? $magisterKimia : null;
    if ($magisterKimiaDitemukan) {
        break;
    }
}

echo json_encode($magisterKimiaDitemukan);
