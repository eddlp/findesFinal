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
    $disponible = $catalogoUtil->validarReserva($r,$fechaDesde,$fechaHasta,$disponible);
}
return $disponible;