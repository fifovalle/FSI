<?php
include 'databases.php';

$staffModel = new Staff($koneksi);

$staffID = isset($_GET['staff_id']) ? $_GET['staff_id'] : null;
$dataStaff = $staffModel->tampilkanDataStaff($staffID);

$staffDitemukan = null;

foreach ($dataStaff as $staff) {
    $staffDitemukan = $staff['ID_Staff'] == $staffID ? $staff : null;
    if ($staffDitemukan) {
        break;
    }
}

echo json_encode($staffDitemukan);
