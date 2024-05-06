<?php
include 'databases.php';

$navbarModel = new Navbar($koneksi);

$navbarID = isset($_GET['navbar_id']) ? $_GET['navbar_id'] : null;
$dataNavbar = $navbarModel->tampilkanDataNavbar($navbarID);

$navbarDitemukan = null;

foreach ($dataNavbar as $navbar) {
    $navbarDitemukan = $navbar['ID_Navbar'] == $navbarID ? $navbar : null;
    if ($navbarDitemukan) {
        break;
    }
}

echo json_encode($navbarDitemukan);
