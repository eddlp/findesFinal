<?php
use app\repository\CaracteristicaRepository;
use app\repository\CasaCaracteristicaRepository;
use app\repository\CasaRepository;
use app\repository\EstadoRepository;
use app\repository\UsuarioRepository;

require_once('repository/EstadoRepository.php');
require_once('repository/CaracteristicaRepository.php');
require_once('repository/CasaCaracteristicaRepository.php');
require_once('repository/CasaRepository.php');
require_once('repository/UsuarioRepository.php');
require_once('repository/Connection.php');
require_once('model/Estado.php');
require_once('model/Caracteristica.php');
require_once('model/CasaCaracteristica.php');
require_once('model/Casa.php');
require_once('model/Usuario.php');

if(isset($_SESSION['id']) && !$_SESSION['admin']) {
    if(!isset($_GET['idCasa'])) {
        $_SESSION['error'] = "El id de la casa es requerido";
        header("location: error.php");
    } else {
        //Busco la casa
        $casaRepository = new CasaRepository();
        $casa = $casaRepository->getOne($_GET['idCasa']);
        //Busco el idPersona de esa casa
        $duenio = $casa->getIdPersona();
        //Busco el usuario
        $usuarioRepository = new UsuarioRepository();
        $usuario = $usuarioRepository->getOne($_SESSION['id']);
        //Busco el idPersona del usuario
        $idPersona = $usuario->getIdPersona();
        if($duenio!=$idPersona) {
            $_SESSION['error'] = "Usted no es dueño de esa casa";
            header("location: error.php");
        } else {
?>
<div class="container principal">
    <div class="row">
        <?php if(isset($_SESSION['casaNueva'])) { ?>
            <h3>Seleccione las caracter&iacute;sticas de su casa - (Paso 2/2)</h3>
        <?php } else { ?>
            <h3>Seleccione las caracter&iacute;sticas de su casa</h3>
        <?php } ?>
        <div class="col-md-12">
            <form <?php if(isset($_SESSION['casaNueva'])) { ?>
                    action="controller/casaCaracteristica/casa_caracteristicas.php"
                <?php unset($_SESSION['casaNueva']);
                } else { ?>
                    action="controller/casaCaracteristica/casa_caracteristicas_update.php"
                <?php } ?>
                method="post" role="form">
                <div class="form-group" hidden>
                    <label for="idCasa">ID Casa</label>
                    <input type="text" class="form-control" id="idCasa"
                           name="idCasa" value="<?php echo($_GET['idCasa'])?>">
                </div>
                <?php
                $estadoRepository = new EstadoRepository();
                $estado = $estadoRepository->getOneByName("Valida");
                $caracteristicaRepository = new CaracteristicaRepository();
                $caracteristicas = $caracteristicaRepository->getAllByEstado($estado->getId());
                foreach ($caracteristicas as $c) {
                ?>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="<?php echo($c->getId());?>"
                            <?php
                                $casaCaracteristicaRepository = new CasaCaracteristicaRepository();
                                $idCasa = $_GET['idCasa'];
                                $idCaracteristica = $c->getId();
                                $casaCaracteristica = $casaCaracteristicaRepository
                                    ->getOneByCasaAndCaracteristica($idCasa,$idCaracteristica);
                                if(isset($casaCaracteristica) && !is_null($casaCaracteristica->getId())) { ?>
                                    checked
                                <?php } ?>
                            >
                        <?php echo($c->getNombre());?>
                    </label>
                </div>
                <?php } ?>
                <div class="row">
                    <button type="submit" class="btn btn-success">Finalizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php }
    }
} else {
    $_SESSION['error'] = "Acceso denegado";
    header("location: error.php");
} ?>