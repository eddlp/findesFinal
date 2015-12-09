<?php
header("Content-type:application/json");
use app\repository\CasaRepository;
use app\repository\ReservaRepository;

require_once('../../repository/CasaRepository.php');
require_once('../../repository/ReservaRepository.php');
require_once('../../repository/Connection.php');
require_once('../../model/Casa.php');
require_once('../../model/Reserva.php');

$casaRepository = new CasaRepository();
$casa = $casaRepository->getOne($_POST['idCasa']);
$fechaDesde = $_POST['fechaDesde'];
$fechaHasta = $_POST['fechaHasta'];

$fechaDesde=date("d-m-Y",strtotime($fechaDesde));
$fechaHasta=date("d-m-Y",strtotime($fechaHasta));

$_SESSION['fechaDesde']=$fechaDesde;
$_SESSION['fechaHasta']=$fechaHasta;

$reservaRepository = new ReservaRepository();
$catalogoUtil = new CatalogoUtil();
$disponible = true;
$reservas = $reservaRepository->getAllByCasaId($casa->getId());
foreach ($reservas as $r) {
    $fDesde = $reserva->getFechaDesde();
    $fHasta = $reserva->getFechaHasta();

    $fDesde = date("d-m-Y", strtotime($fDesde));
    $fHasta = date("d-m-Y", strtotime($fHasta));

    if (($fechaDesde >= $fDesde) && ($fechaDesde < $fHasta)) {
        $disponible = false;
        return $disponible;
    } else if (($fechaHasta > $fDesde) && ($fechaHasta <= $fHasta)) {
        $disponible = false;
        return $disponible;
    } else if (($fechaDesde < $fDesde) && ($fechaHasta > $fHasta)) {
        $disponible = false;
        return $disponible;
    }
}
return $disponible;