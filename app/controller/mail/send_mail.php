<?php
use app\repository\CasaRepository;
use app\repository\UsuarioRepository;

require_once('../../repository/CasaRepository.php');
require_once('../../repository/UsuarioRepository.php');
require_once('../../repository/Connection.php');

require_once('../../model/Casa.php');
require_once('../../model/Usuario.php');

$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
$usuarioRepository = new UsuarioRepository();
if(isset($_POST['idCasa'])) {
    $casaRepository = new CasaRepository();
    $casa = $casaRepository->getOne($_POST['idCasa']);
    $usuario = $usuarioRepository->getOneByPersona($casa->getIdPersona());
    $to = $usuario->getEmail();
} else {
    $to = "adrian.trik@hotmail.com";
}
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859- 1\r\n";
//Busco el usuario que mandó el mail
$usuario = $usuarioRepository->getOne($_SESSION['id']);
$from = $usuario->getEmail();
$headers .= "From: ".$from."\r\n";
mail($to,$asunto,$mensaje,$headers);
if(isset($_POST['idCasa'])) {
    header("location: ../../casa_detail.php?idCasa=".$_POST['idCasa']);
} else {
    header("location: ../../index.php");
}
?>

