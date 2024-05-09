<?php
include 'databases.php';

$studyModel = new ProgramStudi($koneksi);

$studyID = isset($_GET['study_id']) ? $_GET['study_id'] : null;
$dataStudy = $studyModel->tampilkanDataProgramStudi($studyID);

$studyDitemukan = null;

foreach ($dataStudy as $study) {
    $studyDitemukan = $study['ID_Prodi'] == $studyID ? $study : null;
    if ($studyDitemukan) {
        break;
    }
}

echo json_encode($studyDitemukan);
