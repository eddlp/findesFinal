<?php

use app\repository\CasaRepository;
use app\repository\ReservaRepository;

require_once('../../repository/CasaRepository.php');
require_once('../../repository/ReservaRepository.php');
require_once('../../repository/Connection.php');
require_once('../../model/Casa.php');
require_once('../../model/Reserva.php');

$casaRepository = new CasaRepository();

$id=($_POST['idCasa']);
$fechaDesde = $_POST['fechaDesde'];
$fechaHasta = $_POST['fechaHasta'];

$fechaDesde=date("d-m-Y",strtotime($fechaDesde));
$fechaHasta=date("d-m-Y",strtotime($fechaHasta));

$casa = $casaRepository->getOne($id);
$reservaRepository = new ReservaRepository();
$disponible = 1;
$reservas = $reservaRepository->getAllByCasaId($casa->getId());

foreach ($reservas as $r) {
    $fDesde = $r->getFechaDesde();
    $fHasta = $r->getFechaHasta();

    $fDesde = date("d-m-Y", strtotime($fDesde));
    $fHasta = date("d-m-Y", strtotime($fHasta));

    if (($fechaDesde >= $fDesde) && ($fechaDesde < $fHasta)) {
        $disponible = 0;
    } else if (($fechaHasta > $fDesde) && ($fechaHasta <= $fHasta)) {
        $disponible = 0;
    } else if (($fechaDesde < $fDesde) && ($fechaHasta > $fHasta)) {
        $disponible = 0;
    }
}

$_SESSION['fechaDesde']=$fechaDesde;
$_SESSION['fechaHasta']=$fechaHasta;

header("Content-type:application/json");
echo json_encode($disponible);
