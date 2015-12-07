<?php
    use app\repository\PersonaRepository;
    use app\repository\UsuarioRepository;

    require_once('repository/PersonaRepository.php');
    require_once('repository/UsuarioRepository.php');
    require_once('repository/Connection.php');
    require_once('model/Usuario.php');
    require_once('model/Persona.php');

    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $usuarioRepository = new UsuarioRepository();
        $usuario = $usuarioRepository->getOne($id);
        $personaRepository = new PersonaRepository();
        $idPersona = $usuario->getIdPersona();
        $persona = $personaRepository->getOne($idPersona);
    }
?>
<div class="container" ng-controller="SignupController">
    <div class="row">
        <h2>Registro de usuario</h2>
        <div class="col-md-12">
            <form role="form" method="post" action="controller/usuario/usuario_update.php">
                <div class="col-md-6  col-xs-12">
                    <h4>Datos de Sesion</h4>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            <?php if (isset($usuario)) { ?>
                                value="<?php echo($usuario->getEmail())?>">
                            <?php } else { ?>
                                placeholder="Introduce tu email">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="user">Nombre de Usuario</label>
                        <input type="text" class="form-control" id="user" name="user"
                            <?php if (isset($usuario)) { ?>
                                value="<?php echo($usuario->getUsername())?>">
                            <?php } else { ?>
                               placeholder="Introduce tu nombre de usuario">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="pass">Contrase&#241;a</label>
                        <input type="password" class="form-control" id="pass" name="pass"
                            <?php if (isset($usuario)) { ?>
                                value="<?php echo($usuario->getPass())?>">
                            <?php } else { ?>
                               placeholder="Introduce tu contrase&#241;a">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="repass">Confirmar contrase&#241;a</label>
                        <input type="password" class="form-control" id="repass" name="repass"
                            <?php if (isset($usuario)) { ?>
                                value="<?php echo($usuario->getPass())?>">
                            <?php } else { ?>
                               placeholder="Introduce tu contrase&#241;a">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6  col-xs-12">
                    <h4>Datos Personales</h4>

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                            <?php if (isset($persona)) { ?>
                                value="<?php echo($persona->getNombre())?>">
                            <?php } else { ?>
                               placeholder="Introduce tu nombre">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido"
                            <?php if (isset($persona)) { ?>
                                value="<?php echo($persona->getApellido())?>">
                            <?php } else { ?>
                               placeholder="Introduce tu apellido">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input type="text" class="form-control" id="dni" name="dni"
                            <?php if (isset($persona)) { ?>
                               value="<?php echo($persona->getDni())?>">
                            <?php } else { ?>
                                placeholder="Introduce tu DNI">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="localidad">Localidad</label>
                        <input type="text" class="form-control" id="localidad" name="localidad"
                            <?php if (isset($persona)) { ?>
                               value="<?php echo($persona->getLocalidad())?>">
                            <?php } else { ?>
                                placeholder="Introduce tu localidad">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="dir">Direcci&oacute;n</label>
                        <input type="text" class="form-control" id="dir" name="dir"
                            <?php if (isset($persona)) { ?>
                               value="<?php echo($persona->getDireccion())?>">
                            <?php } else { ?>
                                placeholder="Introduce tu direcci&oacute;n">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="tel1">Tel&eacute;fono</label>
                        <input type="text" class="form-control" id="tel1" name="tel1"
                            <?php if (isset($persona)) { ?>
                               value="<?php echo($persona->getTelefono())?>">
                            <?php } else { ?>
                                placeholder="Introduce tu tel&eacute;fono">
                        <?php } ?>
                    </div>

                    <div class="form-group">
                        <label for="tel2">Tel&eacute;fono secundario</label>
                        <input type="text" class="form-control" id="tel2" name="tel2"
                            <?php if (isset($persona)) { ?>
                               value="<?php echo($persona->getTelefono2())?>">
                            <?php } else { ?>
                                placeholder="Introduce tu tel&eacute;fono">
                        <?php } ?>
                    </div>
                </div>
            <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div
    </div>
</div>