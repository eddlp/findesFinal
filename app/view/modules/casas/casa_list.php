<?php
    use app\repository\CasaRepository;
    use app\repository\PersonaRepository;
use app\repository\UsuarioRepository;

    require_once('repository/CasaRepository.php');
    require_once('repository/PersonaRepository.php');
    require_once('repository/UsuarioRepository.php');
    require_once('model/Casa.php');
    require_once('model/Persona.php');
    require_once('model/Usuario.php');
    require_once('repository/Connection.php');
?>
<div class="container">
    <div class="row">
        <h3>Listado de Casas</h3>
        <div class="col-md-12">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <?php if(!$_SESSION['admin']) { ?>
            <a href="casa_new.php" class="btn btn-primary" role="button">
                <span class="glyphicon glyphicon-plus"></span> Agregar casa
            </a><br><br>
            <?php } ?>
            <table class="table">
                <tr>
                    <th>ID </th>
                    <?php if($_SESSION['admin']){ ?>
                        <th>Due&#241;o</th>
                    <?php } ?>
                    <th>Direcci&oacute;n</th>
                    <th>Capacidad </th>
                    <th>Ambientes</th>
                    <th>Ba&#241;os</th>
                    <th>Sup.(M2)</th>
                    <th>Dormitorios</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    $casaRepository = new CasaRepository();
                    if($_SESSION['admin']) {
                        $casas = $casaRepository->getAll();
                    } else {
                        $idUsuario = $_SESSION['id'];
                        $usuarioRepository = new UsuarioRepository();
                        $usuario = $usuarioRepository->getOne($idUsuario);
                        $casas = $casaRepository->getAllByPersona($usuario->getIdPersona());
                    }
                    foreach ($casas as $c) {
                        $personaRepository = new PersonaRepository();
                        $persona = $personaRepository->getOne($c->getIdPersona())
                ?>
                <tr>
                    <td>
                        <?php echo($c->getId());?>
                    </td>
                    <?php if($_SESSION['admin']){ ?>
                        <td>
                            <?php echo($persona->getNombre().' '.$persona->getApellido());?>
                        </td>
                    <?php } ?>
                    <td>
                        <?php echo($c->getDireccion());?>
                    </td>
                    <td>
                        <?php echo($c->getCapacidad());?> personas
                    </td>
                    <td>
                        <?php echo($c->getAmbientes());?>
                    </td>
                    <td>
                        <?php echo($c->getBanios());?>
                    </td>
                    <td>
                        <?php echo($c->getSuperficie());?>
                    </td>
                    <td>
                        <?php echo($c->getDormitorios());?>
                    </td>
                    <td>
                        <a href="casa_new.php?id=<?php echo($c->getId());?>">
                            <span class="glyphicon glyphicon-edit"></span> Editar
                        </a>
                    </td>
                    <td>
                        <a href="controller/casa/casa_baja.php?id=<?php echo($c->getId());?>">
                            <span class="glyphicon glyphicon-remove"></span> Eliminar
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>