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
    header('location: error.php');
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
    <h2 class="encabezado">Detalle de la casa</h2>
    <hr>
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
    <div class="row container-casadetail">
        <div class="col-md-8 col-xs-12 imagenes">
            <div>
            <h3>Im&aacute;genes</h3>
                <img src="imagenesCasas/<?php echo($casa->getImg1()) ?>" alt="imagencasa" class="imagen-grande" />
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-2">
                  <h4>img1</h4>
                </div>
                <div class="col-md-2 col-xs-2">
                    <h4>img2</h4>
                </div>
                <div class="col-md-2 col-xs-2">
                    <h4>img3</h4>
                </div>
                <div class="col-md-2 col-xs-2">
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
                <hr class="items">
                <li><p><span class="titulo">Direccion: </span><?php echo($casa->getDireccion()); ?></p></li>
                <hr class="items">
                <li><p><span class="titulo">Capacidad: </span><?php echo($casa->getCapacidad()); ?> personas</p></li>
                <hr class="items">
                <li><p><span class="titulo">Dormitorios:</span> <?php echo($casa->getDormitorios()); ?></p></li>
                <hr class="items">
                <li><p><span class="titulo">Ambientes: </span><?php echo($casa->getAmbientes()); ?></p></li>
                <hr class="items">
                <li><p><span class="titulo">Banos: </span><?php echo($casa->getBanios()); ?></p></li>
                <hr class="items">
                <li><p><span class="titulo">Superficie: </span><?php echo($casa->getSuperficie()); ?> M2</p></li>
                <hr class="items">
                <li><p><span class="titulo">Valor: </span><?php echo($casa->getValor()); ?></p></li>
                <hr class="items">
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