<?php

use app\repository\UsuarioRepository;
require_once('../../repository/UsuarioRepository.php');
require_once('../../repository/Connection.php');
require_once('../../model/Usuario.php');

$usuarioRepository = new UsuarioRepository();
$usuarios = $usuarioRepository->getAll();
foreach ($usuarios as $u) {
    if(isset($_POST[$u->getId()])) {
        $u->setHabilitado(true);
    } else {
        $u->setHabilitado(false);
    }
    $usuarioRepository->update($u);
}
header("location: ../../user_list.php");
?>