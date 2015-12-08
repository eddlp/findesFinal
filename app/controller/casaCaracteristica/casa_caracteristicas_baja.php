<?php
use app\repository\CaracteristicaRepository;
require_once('../../repository/CaracteristicaRepository.php');
require_once('../../repository/Connection.php');
$id = $_GET['id'];
$caracteristicaRepository = new CaracteristicaRepository();
$caracteristicaRepository->delete($id);
header("location: ../../carac_list.php");
?>
