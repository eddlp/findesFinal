<?php

    use app\repository\UsuarioRepository;

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
            $admin = $usuario->getAdmin();
            $_SESSION['id']=$id;
            $_SESSION['admin']=$admin;
            header("location: ../../index.php");
        } else {
            echo('Email o password iconrrectos');
        }
    } else {
        echo('Email o password incorrectos');
    }
?>
