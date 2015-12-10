<?php

    use app\model\Usuario;
    use app\repository\UsuarioRepository;

    require_once('../../repository/UsuarioRepository.php');
    require_once('../../model/Usuario.php');
    require_once('../../repository/Connection.php');

    session_start();
    $email = $_POST['email'];
    $pass = sha1($_POST['pass']);

    $usuarioReposiroty = new UsuarioRepository();
    $usuario = new Usuario();
    $usuario = $usuarioReposiroty->getOneByEmail($email);

    if (!$usuario->getHabilitado()) {
        $_SESSION['error'] = "Usuario deshabilitado";
        header('location: ../../error.php');
    } else {

        if (isset($usuario)) {
            $passBD = $usuario->getPass();
            if ($pass == $passBD) {
                $id = $usuario->getId();
                $admin = $usuario->getAdmin();
                $_SESSION['id'] = $id;
                $_SESSION['admin'] = $admin;
                //Just for test purpose
                $to = "Adrian.trik@hotmail.com";
                $asunto = $email;
                $mensaje = "Se ha registrado un inicio de sesion";
                mail($to,$asunto,$mensaje);
		//Finish test
                header("location: ../../index.php");
            } else {
                $_SESSION['errorSesion'] = true;
                header("location: ../../user_signin.php");
            }
        } else {
            $_SESSION['errorSesion'] = true;
            header("location: ../../user_signin.php");
        }
    }
?>
