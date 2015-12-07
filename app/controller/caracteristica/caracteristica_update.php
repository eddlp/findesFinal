<?php
use app\model\Caracteristica;
use app\repository\CaracteristicaRepository;
use app\repository\EstadoRepository;

require_once('../../repository/CaracteristicaRepository.php');
require_once('../../repository/EstadoRepository.php');
require_once('../../model/Caracteristica.php');
require_once('../../model/Estado.php');
require_once('../../repository/Connection.php');

$caracteristicaRepository = new CaracteristicaRepository();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    //Busco la caracteristica
    $caracteristica = $caracteristicaRepository->getOne($id);
    //Seteo los campos que podrian haber cambiado
    $caracteristica->setNombre($_POST['nombre']);
    //Actualizo la caracteristica
    $caracteristicaRepository->update($caracteristica);
} else {
    $caracteristica = new Caracteristica();
    $caracteristica->setNombre($_POST['nombre']);
    //Le seteo el estado "valida"
    $estadoRepository = new EstadoRepository();
    $estado = $estadoRepository->getOneByName("Valida");
    $caracteristica->setIdEstado($estado->getId());
    $caracteristicaRepository->insert($caracteristica);
}
header("location: ../../carac_list.php");
?>
