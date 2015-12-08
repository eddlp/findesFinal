<?php
use app\model\Caracteristica;
use app\repository\CaracteristicaRepository;

require_once('repository/CaracteristicaRepository.php');
require_once('repository/Connection.php');
require_once('model/Caracteristica.php');

if(isset($_SESSION['id']) && $_SESSION['admin']) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $caracteristica = new Caracteristica();
        $caracteristicaRepository = new CaracteristicaRepository();
        $caracteristica = $caracteristicaRepository->getOne($id);
        $nombre = $caracteristica->getNombre();
    }
?>
<div class="container principal" ng-controller="CaracteristicasController">
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <h3>Agregar caracteristica</h3>

            <form role="form" method="post" id="caractAlta"
                  action="controller/caracteristica/caracteristica_update.php">
                <?php if (isset($id)) { ?>
                    <div class="form-group" hidden>
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id"
                               name="id" value="<?php echo($id)?>">
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre"
                        <?php if (isset($nombre)) { ?>
                           value="<?php echo($nombre)?>">
                    <?php } else { ?>
                        placeholder="Introduce el nombre de la caracteristica">
                    <?php } ?>
                </div>
                <button type="submit" class="btn btn-default">Confirmar</button>
                <button type="submit" class="btn btn-default">Cancelar</button>
            </form>
        </div>

        <div class="col-md-8 col-xs-12">

        </div>
    </div>
</div>
<?php } else {
    $_SESSION['error'] = "Acceso denegado";
    header("location: error.php");
} ?>