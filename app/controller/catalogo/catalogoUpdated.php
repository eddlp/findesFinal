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
$coleccionCasas = $casaRepository->getAll();
$casas = new ArrayObject();
$fechaDesde = $_POST['fechaDesde'];
$fechaHasta = $_POST['fechaHasta'];
$reservaRepository = new ReservaRepository();
foreach ($coleccionCasas as $casa){
    $disponible = true;
    $reservas = $reservaRepository->getAllByCasaId($casa->getId());
    foreach ($reservas as $r) {
        $fDesde = $r->getFechaDesde();
        $fHasta = $r->getFechaHasta();
        if (($fechaDesde>$fDesde)&&($fechaDesde<$fHasta)) {
            $disponible = false;
        } else if (($fechaHasta>$fDesde)&&($fechaHasta<$fHasta)){
            $disponible = false;
        } else if (($fechaDesde<$fDesde)&&($fechaHasta>$fHasta)) {
            $disponible = false;
        }
    }
    if ($disponible) {
        $casas->append($casa);
    }
}
echo json_encode($casas);
