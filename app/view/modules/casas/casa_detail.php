<?php
use app\repository\CaracteristicaRepository;
use app\repository\CasaCaracteristicaRepository;
use app\repository\CasaRepository;

require_once('repository/CaracteristicaRepository.php');
require_once('repository/CasaCaracteristicaRepository.php');
require_once('repository/CasaRepository.php');
require_once('repository/Connection.php');

require_once('model/Caracteristica.php');
require_once('model/CasaCaracteristica.php');
require_once('model/Casa.php');

if(!isset($_GET['idCasa'])) {
    $_SESSION['error'] = "El id de la casa es requerido";
    header("location: error.php");
} else {
    $casaRepository = new CasaRepository();
    $casa = $casaRepository->getOne($_GET['idCasa']);
    if(is_null($casa->getId())) {
        $_SESSION['error'] = "No existe una casa con ese id";
        header("location: error.php");
    } else {
    $casaCaracteristicaRepository = new CasaCaracteristicaRepository();
    $casaCaracteristicas = $casaCaracteristicaRepository->getAllByCasa($_GET['idCasa']);
?>
<div class="container principal" ng-controller="CasaDetailController">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div>
            <h3>Im&aacute;genes</h3>
                <img src="imagenesCasas/<?php echo($casa->getImg1()) ?> alt="imagendecasa" style="width: 100%">
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-2 miniaturas">
                  <h4>img1</h4>
                </div>
                <div class="col-md-2 col-xs-2 miniaturas">
                    <h4>img2</h4>
                </div>
                <div class="col-md-2 col-xs-2 miniaturas">
                    <h4>img3</h4>
                </div>
                <div class="col-md-2 col-xs-2 miniaturas">
                    <h4>img4</h4>
                </div>
                <div class="col-md-2 col-xs-2 miniaturas">
                    <h4>img5</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <h3>Informaci&oacute;n principal</h3>
            <ul>
                <hr>
                <li>Direccion: <?php echo($casa->getDireccion()); ?></li>
                <hr>
                <li>Capacidad: <?php echo($casa->getCapacidad()); ?> personas</li>
                <hr>
                <li>Dormitorios: <?php echo($casa->getDormitorios()); ?></li>
                <hr>
                <li>Ambientes: <?php echo($casa->getAmbientes()); ?></li>
                <hr>
                <li>Banos: <?php echo($casa->getBanios()); ?></li>
                <hr>
                <li>Superficie: <?php echo($casa->getSuperficie()); ?> M2</li>
                <hr>
                <li>Valor: <?php echo($casa->getValor()); ?></li>
                <hr>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h4>Caracteristicas</h4>
            <?php
            if($casaCaracteristicas->count()==0) {
                echo('<p>Esta casa no posee ninguna caracteristica especial</p>');
            } else {
                foreach ($casaCaracteristicas as $cc) {
                    $caracteristicaRepository = new CaracteristicaRepository();
                    $caracteristica = $caracteristicaRepository->getOne($cc->getIdCaracteristica());
                    ?>
                    <p><span class="glyphicon glyphicon-star"></span> <?php echo($caracteristica->getNombre()); ?></p>
                <?php }
            }?>
            AGREGAR BOTON CONTACTAR DUEÑO
        </div>
        <div class="col-md-4 col-xs-12">
            <!--Se muestra solo si no se definio previamente el intervalo de fechas de reserva-->
            <div>
                <h4>Verificar Disponibilidad</h4>
                <form action="">
                    <div class="control-group">
                        <label for="date-picker-3" class="control-label">Desde</label>
                        <div class="controls">
                            <div class="input-group">
                                <label for="fechadesde" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                <input id="fechadesde" type="text" class="date-picker form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="date-picker-3" class="control-label">Hasta</label>
                        <div class="controls">
                            <div class="input-group">
                                <label for="fechahasta" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                <input id="fechahasta" type="text" class="date-picker form-control" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Verificar</button>
                </form>
            </div>
            <hr>
            <!--Se muestra solo si se definio previamente el intervalo de fechas de reserva-->

            <h4>Confirmar reserva para fecha:</h4>
            <p>Desde dd/mm/aaaa hasta dd/mm/aaaa</p>
            <form action="">
                <button type="submit" class="btn btn-success">RESERVAR AHORA</button>
            </form>

        </div>
    </div>
</div>
<?php
    }
}
?>