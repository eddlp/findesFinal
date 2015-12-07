<?php

use app\model\Casa;
use app\repository\CasaRepository;
use app\repository\UsuarioRepository;

require_once('../../repository/CasaRepository.php');
require_once('../../repository/Connection.php');
require_once('../../repository/UsuarioRepository.php');
require_once('../../model/Casa.php');
require_once('../../model/Usuario.php');


session_start();
$casaRepository = new CasaRepository();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    //Busco la casa
    $casa = $casaRepository->getOne($id);
    //Seteo los campos que podrian haber cambiado
    $casa->setDireccion($_POST['direccion']);
    $casa->setCapacidad($_POST['capacidad']);
    $casa->setDormitorios($_POST['dormitorios']);
    $casa->setAmbientes($_POST['ambientes']);
    $casa->setBanios($_POST['banios']);
    $casa->setSuperficie($_POST['superficie']);
    $casa->setImg1($_POST['img1']);
    $casa->setImg2($_POST['img2']);
    $casa->setImg3($_POST['img3']);
    $casa->setImg4($_POST['img4']);
    $casa->setImg5($_POST['img5']);
    $casaRepository->update($casa);
} else {
    $casa = new Casa();
    $idUsuario = $_SESSION['id'];
    $usuarioRepository = new UsuarioRepository();
    $usuario = $usuarioRepository->getOne($idUsuario);
    $casa->setIdPersona($usuario->getIdPersona());
    $casa->setDireccion($_POST['direccion']);
    $casa->setCapacidad($_POST['capacidad']);
    $casa->setDormitorios($_POST['dormitorios']);
    $casa->setAmbientes($_POST['ambientes']);
    $casa->setBanios($_POST['banios']);
    $casa->setSuperficie($_POST['superficie']);
    $casa->setImg1($_POST['img1']);
    $casa->setImg2($_POST['img2']);
    $casa->setImg3($_POST['img3']);
    $casa->setImg4($_POST['img4']);
    $casa->setImg5($_POST['img5']);
    $casaRepository->insert($casa);
}
header("location: ../../casa_list.php");
?>
