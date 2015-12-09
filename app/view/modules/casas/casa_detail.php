

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
    $idcasa = $_GET['idCasa'];
    if (is_null($casa->getId())) {
        $_SESSION['error'] = "No existe una casa con ese id";
        header("location: error.php");
    } else {
        $casaCaracteristicaRepository = new CasaCaracteristicaRepository();
        $casaCaracteristicas = $casaCaracteristicaRepository->getAllByCasa($_GET['idCasa']);
        ?>

        <div ng-init="idCasaAngular = '<?php echo($idcasa); ?>'"></div>
        <!-- Carga de imagenes al scope-->
        <?php if (isset($casa)) {
            $img1 = $casa->getImg1();
            if (isset($img1) && $img1 != "") {
                $img1Test = true;
                ?>
                <div ng-init="img1 = '<?php echo($img1); ?>'"></div>
            <?php }
        } ?>

        <?php if (isset($casa)) {
            $img2 = $casa->getImg2();
            if (isset($img2) && $img2 != "") {
                $img2Test = true;
                ?>
                <div data-ng-init="img2 = '<?php echo($img2) ?>'"></div>
            <?php }
        } ?>

        <?php if (isset($casa)) {
            $img3 = $casa->getImg3();
            if (isset($img3) && $img3 != "") {
                $img3Test = true;
                ?>
                <div data-ng-init="img3 = '<?php echo($img3) ?>'"></div>
            <?php }
        } ?>

        <?php if (isset($casa)) {
            $img4 = $casa->getImg4();
            if (isset($img4) && $img4 != "") {
                $img4Test = true;
                ?>
                <div data-ng-init="img4 = '<?php echo($img4) ?>'"></div>
                alt="imagendecasa">
            <?php }
        } ?>

        <?php if (isset($casa)) {
            $img5 = $casa->getImg5();
            if (isset($img5) && $img5 != "") {
                $img5Test = true;
                ?>
                <div data-ng-init="img5 = '<?php echo($img5) ?>'"></div>
            <?php }
        } ?>
        <!--Fin de carga-->

        <div class="container principal container-casadetail" ng-controller="CasaDetailController">
        <h2 class="encabezado">Detalle de la casa</h2>
        <hr>


        <?php
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id']?>
            <div ng-init="idUsuario = '<?php echo($id); ?>'"></div>
            <?php
             if (!isset($_SESSION['fechaDesde']) && !isset($_SESSION['fechaHasta'])) {
            ?>
            <div ng-if="mensajeError">
                <div class="alert alert-danger">
                    Lamentamos informarte que no hay disponibilidad para las fechas ingresadas.
                </div>

            </div>
            <div ng-if="mensajeExito">
                <div class="alert alert-success">
                    Nos alegra informarte que hay disponibilidad para las fechas ingresadas.
                </div>
            </div>

            <div id="verificarcion">
                <h3>Verificar Disponibilidad</h3>

                <div class="control-group">
                    <label for="date-picker-3" class="control-label">Desde</label>

                    <div class="controls">
                        <div class="input-group">
                            <label for="fechadesde" class="input-group-addon btn"><span
                                    class="glyphicon glyphicon-calendar"></span></label>
                            <input id="fechadesde" type="text" class="date-picker form-control" ng-model="fechadesde"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label for="date-picker-3" class="control-label">Hasta</label>

                    <div class="controls">
                        <div class="input-group">
                            <label for="fechahasta" class="input-group-addon btn"><span
                                    class="glyphicon glyphicon-calendar"></span></label>
                            <input id="fechahasta" type="text" class="date-picker form-control" ng-model="fechahasta"/>
                        </div>
                    </div>
                </div>
                <br>
                <label id="fecha-error" class="error label-error" for="email">
                    Error: Fechas vacías o fecha ingreso mayor a fecha salida.
                </label><br>
                <button class="btn btn-primary" ng-click="verificarDisponibilidad(fechadesde,fechahasta,idCasaAngular)">
                    Verificar
                </button>
            </div>
            <div id="confirmar">
                <div class="confirmar">
                    <button ng-click="reservar()" class="btn btn-success">RESERVAR AHORA</button>
                </div>
            </div>
            <hr>
            <?php
            }
                else { ?>
                    <div class="confirmar" id="confirmar">
                        <form action="">
                            <button type="submit" class="btn btn-success">RESERVAR AHORA</button>
                        </form>
                    </div>
                <?php }
            }
        else{ ?>

            <div class="alert alert-warning">Para poder reservar primero tenes que loguearte.</div>

            <?php } ?>


            <div class="row">
                <div class="col-md-8 col-xs-12 imagenes">
                    <div>
                        <h3>Im&aacute;genes</h3>
                        <img ng-src="imagenesCasas/{{ubicacion}}" alt="imagencasa"
                             class="imagen-grande"/>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-2 miniatura">
                            <?php if (isset($casa)) {
                                $img1 = $casa->getImg1();
                                if (isset($img1) && $img1 != "") { ?>
                                    <img class="img1 img-miniatura1 seleccionada" ng-src="imagenesCasas/{{img1}}?> "
                                         alt="imagendecasa" ng-click="showImg(img1, 'img1')">
                                <?php }
                            } ?>
                        </div>
                        <div class="col-md-2 col-xs-2 miniatura">
                            <?php if (isset($casa)) {
                                $img2 = $casa->getImg2();
                                if (isset($img2) && $img2 != "") { ?>
                                    <img class="img2 img-miniatura1" ng-src="imagenesCasas/{{img2}} ?> "
                                         alt="imagendecasa" ng-click="showImg(img2,'img2')">
                                <?php }
                            } ?>
                        </div>
                        <div class="col-md-2 col-xs-2 miniatura">
                            <?php if (isset($casa)) {
                                $img3 = $casa->getImg3();
                                if (isset($img3) && $img3 != "") { ?>
                                    <img class="img3 img-miniatura1" ng-src="imagenesCasas/{{img3}}"
                                         alt="imagendecasa" ng-click="showImg(img3,'img3')  ">
                                <?php }
                            } ?>
                        </div>
                        <div class="col-md-2 col-xs-2 miniatura">
                            <?php if (isset($casa)) {
                                $img4 = $casa->getImg4();
                                if (isset($img4) && $img4 != "") { ?>
                                    <img class="img4 img-miniatura1" ng-src="imagenesCasas/{{img4}} ?> "
                                         alt="imagendecasa" ng-click="showImg(img4,'img4')">
                                <?php }
                            } ?>
                        </div>
                        <div class="col-md-2 col-xs-2 miniatura">
                            <?php if (isset($casa)) {
                                $img5 = $casa->getImg5();
                                if (isset($img5) && $img5 != "") { ?>
                                    <img class="img5 img-miniatura1" ng-src="imagenesCasas/<?php echo($img5) ?> "
                                         alt="imagendecasa" ng-click="showImg(img5,'img5')">
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-12 infoppal">
                    <h3>Informaci&oacute;n principal</h3>
                    <ul>
                        <hr class="items">
                        <li><p><span class="titulo">Direccion: </span><?php echo($casa->getDireccion()); ?></p></li>
                        <hr class="items">
                        <li><p><span class="titulo">Capacidad: </span><?php echo($casa->getCapacidad()); ?> personas</p>
                        </li>
                        <hr class="items">
                        <li><p><span class="titulo">Dormitorios:</span> <?php echo($casa->getDormitorios()); ?></p></li>
                        <hr class="items">
                        <li><p><span class="titulo">Ambientes: </span><?php echo($casa->getAmbientes()); ?></p></li>
                        <hr class="items">
                        <li><p><span class="titulo">Banos: </span><?php echo($casa->getBanios()); ?></p></li>
                        <hr class="items">
                        <li><p><span class="titulo">Superficie: </span><?php echo($casa->getSuperficie()); ?> M2</p>
                        </li>
                        <hr class="items">
                        <li><p><span class="titulo">Valor por d&iacute;a: </span>$<?php echo($casa->getValor()); ?></p>
                        </li>
                        <hr class="items">
                    </ul>

                    <?php if(isset($_SESSION['id'])) { ?>
                    <div class="consulta">
                        <button type="button" class="btn btn-info"
                                onclick="location='mail.php?idCasa=<?php echo($casa->getId()); ?>'">
                            <span class="glyphicon glyphicon-envelope"></span> Realizar una consulta
                        </button>
                    </div>
                    <?php } ?>
                    <!--Se muestra solo si se definio previamente el intervalo de fechas de reserva-->

                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-xs-12 caracteristicas">
                    <h3>Caracteristicas</h3>
                    <?php
                    if ($casaCaracteristicas->count() == 0) {
                        echo('<p>Esta casa no posee ninguna caracteristica especial</p>');
                    } else {
                        foreach ($casaCaracteristicas as $cc) {
                            $caracteristicaRepository = new CaracteristicaRepository();
                            $caracteristica = $caracteristicaRepository->getOne($cc->getIdCaracteristica());
                            ?>
                            <p><span
                                    class="glyphicon glyphicon-star"></span> <?php echo($caracteristica->getNombre()); ?>
                            </p>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
        <?php
    }
}
?>