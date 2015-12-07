<?php
use app\repository\CaracteristicaRepository;
use app\repository\EstadoRepository;

require_once('repository/EstadoRepository.php');
require_once('repository/CaracteristicaRepository.php');
require_once('repository/Connection.php');
require_once('model/Estado.php');
require_once('model/Caracteristica.php');
?>
<div class="container">
    <div class="row">
        <h3>Seleccione las caracter&iacute;sticas de su casa - (Paso 2/2)</h3>
        <div class="col-md-12">
            <form action="controller/casa/casa_caracteristicas.php" method="post" role="form">
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
                        <input type="checkbox" name="<?php echo($c->getNombre());?>">
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