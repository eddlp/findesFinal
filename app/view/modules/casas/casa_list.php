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

    if(isset($_SESSION['id'])) {
        //Paginacion
        $cantidadPorPagina = 3;
        $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : null;
        if (!$pagina) {
            $inicio = 0;
            $pagina = 1;
        }
        else {
            $inicio = ($pagina - 1)*$cantidadPorPagina;
        }
        //Calculo el total de registros
        $casaRepository = new CasaRepository();
        if ($_SESSION['admin']) {
            $totalCasas = $casaRepository->countAll();
        } else {
            $idUsuario = $_SESSION['id'];
            $usuarioRepository = new UsuarioRepository();
            $usuario = $usuarioRepository->getOne($idUsuario);
            $totalCasas = $casaRepository->countAllByPersona($usuario->getIdPersona());
        }
        $totalPaginas = ceil($totalCasas/$cantidadPorPagina);
?>
<div class="container principal">
    <div class="row">
        <h3>Listado de Casas</h3>
        <div class="col-md-12">
            <?php if($totalPaginas>0) { ?>
                <!--Barra de paginacion-->
                <nav>
                    <!-- Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks-->
                    <ul class="pagination">
                        <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                        <?php
                        for($i=1; $i<=$totalPaginas; $i++) {
                            if ($i==$pagina) { ?>
                                <li class='active'>
                                    <a href='casa_list.php?pagina=<?php echo($i);?>'><?php echo($i);?></a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href='casa_list.php?pagina=<?php echo($i);?>'><?php echo($i);?></a>
                                </li>
                            <?php }
                        } ?>
                        <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                    </ul>
                </nav>
            <?php } ?>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Buscar">
            </div>
            <?php if(!$_SESSION['admin']) { ?>
            <a href="casa_new.php" class="btn btn-primary btn-success" role="button">
                <span class="glyphicon glyphicon-plus"></span> Agregar casa
            </a><br><br>
            <?php } ?>
            <form role="form" method="post" action="carac_list.php">
                <table class="table">
                    <tr>
                        <th></th>
                        <?php if($_SESSION['admin']){ ?>
                            <th>Due&#241;o</th>
                        <?php } ?>
                        <th>Direcci&oacute;n</th>
                        <th>Capacidad </th>
                        <th>Ambientes</th>
                        <th>Ba&#241;os</th>
                        <th>Sup.(M2)</th>
                        <th>Dormitorios</th>
                        <th>Valor</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    <?php
                        $casaRepository = new CasaRepository();
                        if($_SESSION['admin']) {
                            $casas = $casaRepository->getAllByPage($inicio, $cantidadPorPagina);
                        } else {
                            $idUsuario = $_SESSION['id'];
                            $usuarioRepository = new UsuarioRepository();
                            $usuario = $usuarioRepository->getOne($idUsuario);
                            $casas = $casaRepository->getAllByPersonaAndPage
                                        ($usuario->getIdPersona(),$inicio, $cantidadPorPagina);
                        }
                        $first = true;
                        foreach ($casas as $c) {
                            $personaRepository = new PersonaRepository();
                            $persona = $personaRepository->getOne($c->getIdPersona())
                    ?>
                    <tr>
                        <td>
                            <input type="radio" name="idCasa"
                                   <?php if($first) {
                                       echo('checked');
                                       $first = false;
                                   } ?>
                                   value="<?php echo($c->getId());?>">
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
                            $<?php echo($c->getValor());?>
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
                <?php if($casas->count()>0) { ?>
                    <button type="submit" class="btn btn-success">Ver caracteristicas</button>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
<?php } else {
    $_SESSION['error'] = "Acceso denegado";
    header("location: error.php");
} ?>