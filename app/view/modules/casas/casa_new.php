<?php

use app\repository\CasaRepository;
require_once('repository/CasaRepository.php');
require_once('repository/Connection.php');
require_once('model/Casa.php');

if(isset($_SESSION['id']) && !$_SESSION['admin']) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $casaRepository = new CasaRepository();
        $casa = $casaRepository->getOne($id);
    }
?>
<div class="container principal " ng-controller="CasaNewController">
    <h2 class="encabezado">
    <?php if (isset($id)) {
        echo('Modificar casa');
    } else {
        echo('Nueva casa - (Paso 1/2)');
        $_SESSION['casaNueva']=true;
    }
    ?>
    </h2>
    <hr>
    <div class="container-casanew">
        <form role="form" method="post" id="formCasaNew" enctype="multipart/form-data" action="controller/casa/casa_update.php">
            <div class="row">
                <div class="col-md-6  col-xs-12">
                    <?php if (isset($id)) { ?>
                        <div class="form-group" hidden>
                            <label for="id">ID</label>
                            <input type="text" class="form-control" id="id"
                                   name="id" value="<?php echo($id)?>">
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label for="direccion">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="direccion" name="direccion"
                            <?php if (isset($casa)) { ?>
                               value="<?php echo($casa->getDireccion())?>">
                        <?php } else { ?>
                            placeholder="Ingrese la direccion">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="capacidad">Capacidad</label>
                        <input type="text" class="form-control" id="capacidad" name="capacidad"
                            <?php if (isset($casa)) { ?>
                               value="<?php echo($casa->getCapacidad())?>">
                        <?php } else { ?>
                            placeholder="Ingrese la capacidad">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="dormitorios">Dormitorios</label>
                        <input type="text" class="form-control" id="dormitorios" name="dormitorios"
                            <?php if (isset($casa)) { ?>
                               value="<?php echo($casa->getDormitorios())?>">
                        <?php } else { ?>
                            placeholder="Ingrese la cantidad de dormitorios">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="ambientes">Ambientes</label>
                        <input type="text" class="form-control" id="ambientes" name="ambientes"
                            <?php if (isset($casa)) { ?>
                               value="<?php echo($casa->getAmbientes())?>">
                        <?php } else { ?>
                            placeholder="Ingrese la cantidad de ambientes">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="banios">Ba&#241;os</label>
                        <input type="text" class="form-control" id="banios" name="banios"
                            <?php if (isset($casa)) { ?>
                               value="<?php echo($casa->getBanios())?>">
                        <?php } else { ?>
                            placeholder="Ingrese la cantidad de ba&#241;os">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="superfice">Superfice (MTS2)</label>
                        <input type="text" class="form-control" id="superfice" name="superficie"
                            <?php if (isset($casa)) { ?>
                               value="<?php echo($casa->getSuperficie())?>">
                        <?php } else { ?>
                            placeholder="Ingrese la superficie">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor diario</label>
                        <input type="text" class="form-control" id="valor" name="valor"
                            <?php if (isset($casa)) { ?>
                               value="<?php echo($casa->getValor())?>">
                        <?php } else { ?>
                            placeholder="Ingrese el valor">
                        <?php } ?>
                    </div>

                </div>
                <div class="col-md-6 col-xs-12">
                    <p class="ayuda"><span class="glyphicon glyphicon-info-sign"></span> Las imágenes deben ser: jpg/png/jpeg y no deben pesar más de 2000kb.</p>
                    <?php if (isset($casa)) {
                        $img1= $casa->getImg1();
                        if(isset($img1) &&  $img1!=""){ ?>
                            <img class="img-miniatura" src="imagenesCasas/<?php echo ($img1) ?> " alt="imagendecasa">
                        <?php }
                        } ?>
                    <div class="form-group">
                        <label for="img1">Im&aacute;gen 1: Tapa en el catalogo</label>
                        <input type="file" id="img1" name="img1">
                    </div>
                    <?php if (isset($casa)) {
                        $img2 = $casa->getImg2();
                        if (isset($img2) && $img2 != "") { ?>
                            <img class="img-miniatura" src="imagenesCasas/<?php echo($img2) ?> " alt="imagendecasa">

                        <?php }
                    }?>
                    <div class="form-group">
                        <label for="img2">Im&aacute;gen 2</label>
                        <input type="file" id="img2" name="img2">
                    </div>
                    <?php if (isset($casa)) {
                    $img3= $casa->getImg3();
                    if(isset($img3) && $img3!=""){ ?>
                        <img class="img-miniatura" src="imagenesCasas/<?php echo ($img3) ?> " alt="imagendecasa">
                    <?php }
                    } ?>
                    <div class="form-group">
                        <label for="img3">Im&aacute;gen 3</label>
                        <input type="file" id="img3" name="img3">
                    </div>
                    <?php if (isset($casa)) {
                    $img4= $casa->getImg4();
                    if(isset($img4) && $img4!=""){ ?>
                        <img class="img-miniatura" src="imagenesCasas/<?php echo ($img4) ?> " alt="imagendecasa">
                    <?php }
                    } ?>
                    <div class="form-group">
                        <label for="img4">Im&aacute;gen 4</label>
                        <input type="file" id="img4" name="img4">
                    </div>
                    <?php if (isset($casa)) {
                    $img5= $casa->getImg5();
                    if(isset($img5) && $img5!=""){ ?>
                        <img class="img-miniatura" src="imagenesCasas/<?php echo ($img5) ?> " alt="imagendecasa">
                    <?php }
                    }?>
                    <div class="form-group">
                        <label for="img5">Im&aacute;gen 5</label>
                        <input type="file" id="img5" name="img5">
                    </div>
                </div>
                <hr>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-success">Confirmar y continuar</button>
            </div>
        </form>
    </div>
</div>
<?php } else {
    $_SESSION['error'] = "Acceso denegado";
    header("location: error.php");
} ?>