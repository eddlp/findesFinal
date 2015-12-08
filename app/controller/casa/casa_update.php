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
    $casa->setValor($_POST['valor']);

    for($i=1;$i<6;$i++){
        $inputIMG= 'img'.$i;
        $error= $_FILES[$inputIMG]["error"];
        if($error!=4 && $error!=3){
            $nombreArchivo=cargarImg($id,$i,$inputIMG);
            switch ($i) {
                case 1:
                    $casa->setImg1($nombreArchivo);
                    break;
                case 2:
                    $casa->setImg2($nombreArchivo);
                    break;
                case 3:
                    $casa->setImg3($nombreArchivo);
                    break;
                case 4:
                    $casa->setImg4($nombreArchivo);
                    break;
                case 5:
                    $casa->setImg5($nombreArchivo);
                    break;
            }
        }
    }
    $casaRepository->update($casa);
    header("location: ../../casa_list.php");
} else {
    try {
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
        $casa->setValor($_POST['valor']);
        $id = $casaRepository->insert($casa);
        header("location: ../../casa_carac_new.php?idCasa=" . $id);
    } catch (Exception $e) {
        $_SESSION['error']=$e->getMessage();
        header('location ../../error.php');
        die();
    }
}

function cargarImg ($id,$i,$img){

    //comprobamos si ha ocurrido un error.
    if ($_FILES[$img]["error"] > 0){
       $_SESSION['error']="Ha ocurrido un error en la carga de imágenes";
        header('location: ../../error.php');
        die();

    } else {
        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
        $limite_kb = 500;

        if (in_array($_FILES[$img]['type'], $permitidos) && $_FILES[$img]['size'] <= $limite_kb * 1024){
            $extension=$_FILES[$img]['type'];
            if($extension == "image/jpeg"){
                $extension=".jpeg";
            }elseif($extension == "image/jpg"){
                $extension=".jpg";
            }elseif($extension == "image/png"){
                $extension=".png";
            }
            $nombre=$id.'_'.$i.$extension;
            $ruta = '../../imagenesCasas/'.$nombre;

            $resultado = @move_uploaded_file($_FILES[$img]['tmp_name'], $ruta);
            if ($resultado){
                return $nombre;
            } else {
                $_SESSION['error']="Error interno del sistema. " . "ID IMG:". $img  . " Ruta:". $ruta  ;
                header('location: ../../error.php');
                die();
            }
        } else {
            $_SESSION['error']="Archivo excede el tamaño solicitado: Máximo 500kb.";
            header('location: ../../error.php');
            die();
        }
    }
}