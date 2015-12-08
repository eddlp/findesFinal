<?php
use app\model\CasaCaracteristica;
use app\repository\CaracteristicaRepository;
use app\repository\CasaCaracteristicaRepository;
use app\repository\EstadoRepository;

require_once('../../repository/EstadoRepository.php');
require_once('../../repository/CaracteristicaRepository.php');
require_once('../../repository/CasaCaracteristicaRepository.php');
require_once('../../model/Estado.php');
require_once('../../model/Caracteristica.php');
require_once('../../model/CasaCaracteristica.php');
require_once('../../repository/Connection.php');

$estadoRepository = new EstadoRepository();
$estado = $estadoRepository->getOneByName("Valida");
$caracteristicaRepository = new CaracteristicaRepository();
$caracteristicas = $caracteristicaRepository->getAllByEstado($estado->getId());
foreach ($caracteristicas as $c) {
    if(isset($_POST[$c->getId()])) {
        $casaCaracteristica = new CasaCaracteristica();
        $casaCaracteristica->setDescripcion(null);
        $casaCaracteristica->setIdCasa($_POST['idCasa']);
        $casaCaracteristica->setIdCaracteristica($c->getId());
        $casaCaracteristicaRepository = new CasaCaracteristicaRepository();
        $casaCaracteristicaRepository->insert($casaCaracteristica);
    }
}
header("location: ../../casa_list.php");
?>
