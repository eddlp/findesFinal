<?php

    use app\repository\UsuarioRepository;

    require_once('../../repository/PersonaRepository.php');
    require_once('../../model/Persona.php');
    require_once('../../repository/UsuarioRepository.php');
    require_once('../../model/Usuario.php');
    require_once('../../repository/Connection.php');

    session_start();
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $usuarioReposiroty = new UsuarioRepository();
    $usuario = $usuarioReposiroty->getOneByEmail($email);
    if (isset($usuario)) {
        $passBD = $usuario->getPass();
        if ($pass == $passBD) {
            $id = $usuario->getId();
            $_SESSION['id']=$id;
            header("location: ../../index.php");
        } else {
            echo('Email o password iconrrectos');
        }
    } else {
        echo('Email o password incorrectos');
    }
?>
