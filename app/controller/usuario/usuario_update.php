<?php
    use app\model\Persona;
    use app\model\Usuario;
    use app\repository\PersonaRepository;
    use app\repository\UsuarioRepository;

    require_once('../../repository/PersonaRepository.php');
    require_once('../../model/Persona.php');
    require_once('../../repository/UsuarioRepository.php');
    require_once('../../model/Usuario.php');
    require_once('../../repository/Connection.php');

    session_start();
    $usuarioRepository = new UsuarioRepository();
    $personaRepository = new PersonaRepository();

    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    if($pass==$repass) {
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            //Busco el usuario
            $usuario = $usuarioRepository->getOne($id);
            //Seteo los campos que podrian haber cambiado
            $usuario->setEmail($_POST['email']);
            $usuario->setUsername($_POST['user']);
            $usuario->setPass(sha1($_POST['pass']));
            //Actualizo el usuario
            $usuarioRepository->update($usuario);
            //Busco la persona
            $idPersona = $usuario->getIdPersona();
            $persona = $personaRepository->getOne($idPersona);
            //Seteo los campos que podrian haber cambiado
            $persona->setNombre($_POST['nombre']);
            $persona->setApellido($_POST['apellido']);
            $persona->setDni($_POST['dni']);
            $persona->setDireccion($_POST['dir']);
            $persona->setTelefono($_POST['tel1']);
            $persona->setTelefono2($_POST['tel2']);
            $persona->setLocalidad($_POST['localidad']);
            //Actualizo la persona
            $personaRepository->update($persona);
        } else {
            $email = $_POST['email'];
            $usuarioID = $usuarioRepository->getOneByEmail($email);
            $idUser = $usuarioID->getId();
            $dni = $_POST['dni'];
            $personaDNI = $personaRepository->getOneByDni($dni);
            $idpersona = $personaDNI->getId();
            //Primero creo la persona
            $persona = new Persona();
            $persona->setNombre($_POST['nombre']);
            $persona->setApellido($_POST['apellido']);
            $persona->setDni($_POST['dni']);
            $persona->setDireccion($_POST['dir']);
            $persona->setTelefono($_POST['tel1']);
            $persona->setTelefono2($_POST['tel2']);
            $persona->setLocalidad($_POST['localidad']);
            //Recupero el ID de la persona creada
            $idPersona = $personaRepository->insert($persona);
            //Creo el usuario
            $usuario = new Usuario();
            $usuario->setIdPersona($idPersona);
            $usuario->setEmail($_POST['email']);
            $usuario->setUsername($_POST['user']);
            $usuario->setPass(sha1($_POST['pass']));
            $usuario->setHabilitado(true);
            $usuario->setToken("Generar token");
            $usuario->setFechaToken(new DateTime());
            $usuario->setAdmin(false);
            $id = $usuarioRepository->insert($usuario);
            $_SESSION['id'] = $id;
            $_SESSION['admin'] = 0;
            header("location: ../../index.php");
        }
    }

?>
