<?php
use app\repository\CasaRepository;
use app\repository\UsuarioRepository;

$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];
if(isset($_POST['idCasa'])) {
    $casaRepository = new CasaRepository();
    $casa = $casaRepository->getOne($_POST['idCasa']);
    $usuarioRepository = new UsuarioRepository();
    $usuario = $usuarioRepository->getOneByPersona($casa->getIdPersona());
    $to = $usuario->getEmail();
} else {
    $to = "adrian.trik@hotmail.com";
}
mail($to,$asunto,$mensaje);
if(isset($_POST['idCasa'])) {
    header("location: ../../casa_detail.php?idCasa=".$_POST['idCasa']);
} else {
    header("location: ../../index.php");
}
?>
