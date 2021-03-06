<?php
    use app\repository\CaracteristicaRepository;
use app\repository\CasaCaracteristicaRepository;
use app\repository\EstadoRepository;

    require_once('repository/CaracteristicaRepository.php');
    require_once('repository/CasaCaracteristicaRepository.php');
    require_once('repository/Connection.php');
    require_once('repository/EstadoRepository.php');
    require_once('model/Caracteristica.php');
    require_once('model/CasaCaracteristica.php');
    require_once('model/Estado.php');

    if(isset($_SESSION['id'])) {
        if(!isset($_POST['idCasa']) && !$_SESSION['admin']) {
            $_SESSION['error'] = "Acceso denegado";
            header("location: error.php");
        } else {
?>
<div class="container principal">
    <div class="row">
        <h2 class="encabezado">Listado de Caracter&iacute;sticas</h2>
        <hr>
        <?php if(!$_SESSION['admin']) { ?>
            <div class="alert alert-warning alert-dismissible">
                <strong>ATENCI&Oacute;N USUARIO!</strong> Este m&oacute;dulo se encuentra en desarrollo. Disculpe las molestias.
            </div>
        <?php } ?>
        <div class="col-md-12">
            <?php if(!isset($_POST['idCasa'])) { ?>

                <br>
            <?php } ?>
            <table class="table">
                <tr>
                    <?php if(!isset($_POST['idCasa'])) { ?>
                        <th>ID </th>
                    <?php } ?>
                    <th>Nombre </th>
                    <?php if(!isset($_POST['idCasa'])) { ?>
                        <th>Editar </th>
                        <th>Eliminar</th>
                    <?php } ?>
                </tr>
                <?php
                    $estadoRepository = new EstadoRepository();
                    $estado = $estadoRepository->getOneByName("Valida");
                    $caracteristicaRepository = new CaracteristicaRepository();
                    if(!isset($_POST['idCasa'])) {
                        $caracteristicas = $caracteristicaRepository->getAllByEstado($estado->getId());
                    } else {
                        $casaCaracteristicaRepository = new CasaCaracteristicaRepository();
                        $casaCaracteristicas = $casaCaracteristicaRepository->getAllByCasa($_POST['idCasa']);
                        $caracteristicas = new ArrayObject();
                        foreach($casaCaracteristicas as $cc) {
                            $caracteristica = $caracteristicaRepository->getOne($cc->getIdCaracteristica());
                            $caracteristicas->append($caracteristica);
                        }
                    }
                    foreach ($caracteristicas as $c) {
                ?>
                <tr>
                    <?php if(!isset($_POST['idCasa'])) { ?>
                        <td>
                            <?php echo($c->getId());?>
                        </td>
                    <?php } ?>
                    <td>
                        <?php echo($c->getNombre());?>
                    </td>
                    <?php if(!isset($_POST['idCasa'])) { ?>
                        <td>
                            <a href="carac_new.php?id=<?php echo($c->getId());?>">
                                <span class="glyphicon glyphicon-edit"></span> Editar
                            </a>
                        </td>
                    <?php } ?>
                    <?php if(!isset($_POST['idCasa'])) { ?>
                        <td>
                            <a href="controller/caracteristica/caracteristica_baja.php?id=<?php echo($c->getId());?>">
                                <span class="glyphicon glyphicon-remove"></span> Eliminar
                            </a>
                        </td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>

        </div>
    </div>
</div>
<?php }
    } else {
    $_SESSION['error'] = "Acceso denegado";
    header("location: error.php");
} ?>