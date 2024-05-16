<?php
include 'databases.php';

$agendaModel = new Agenda($koneksi);

$agendaID = isset($_GET['agenda_id']) ? $_GET['agenda_id'] : null;
$dataAgenda = $agendaModel->tampilkanDataAgenda($agendaID);

$agendaDitemukan = null;

foreach ($dataAgenda as $agenda) {
    $agendaDitemukan = $agenda['ID_Agenda'] == $agendaID ? $agenda : null;
    if ($agendaDitemukan) {
        break;
    }
}

echo json_encode($agendaDitemukan);
