<?php
    use app\repository\CasaRepository;
    use app\repository\EstadoRepository;
    use app\repository\PersonaRepository;
    use app\repository\ReservaRepository;
    use app\repository\UsuarioRepository;

    require_once('repository/ReservaRepository.php');
    require_once('repository/PersonaRepository.php');
    require_once('repository/UsuarioRepository.php');
    require_once('repository/CasaRepository.php');
    require_once('repository/EstadoRepository.php');
    require_once('repository/Connection.php');
    require_once('model/Reserva.php');
    require_once('model/Persona.php');
    require_once('model/Usuario.php');
    require_once('model/Casa.php');
    require_once('model/Estado.php');

    if(isset($_SESSION['id'])) {
        if (isset($_GET['mias']) && $_SESSION['admin']) {
            $_SESSION['error'] = "Acceso denegado";
            header("location: error.php");
        } else {
            //Paginacion
            $cantidadPorPagina = 3;
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : null;
            if (!$pagina) {
                $inicio = 0;
                $pagina = 1;
            } else {
                $inicio = ($pagina - 1) * $cantidadPorPagina;
            }
            //Calculo el total de registros
            $reservaRepository = new ReservaRepository();
            if ($_SESSION['admin']) {
                $totalReservas = $reservaRepository->countAll();
            } else {
                $idUsuario = $_SESSION['id'];
                $usuarioRepository = new UsuarioRepository();
                $usuario = $usuarioRepository->getOne($idUsuario);
                $idPersona = $usuario->getIdPersona();
                if (!isset($_GET['mias'])) {
                    $casaRepository = new CasaRepository();
                    $casas = $casaRepository->getAllByPersona($idPersona);
                    $totalReservas = $reservaRepository->countAllByCasas($casas);
                } else {
                    $totalReservas = $reservaRepository->countAllByPersona($idPersona);
                }
            }
            $totalPaginas = ceil($totalReservas / $cantidadPorPagina);
            ?>
            <div class="container principal">
                <div class="row">
                    <h3>Listado de Reservas</h3>

                    <div class="col-md-12">
                        <?php if ($totalPaginas > 0) { ?>
                            <!--Barra de paginacion-->
                            <nav>
                                <!-- Add class .pagination-lg for larger blocks or .pagination-sm for smaller blocks-->
                                <ul class="pagination">
                                    <li><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                                    </li>
                                    <?php
                                    for ($i = 1; $i <= $totalPaginas; $i++) {
                                        if ($i == $pagina) { ?>
                                            <li class='active'>
                                                <a href='res_reporte.php?pagina=<?php
                                                echo($i);
                                                if (isset($_GET['mias'])) {
                                                    echo('&mias=true');
                                                }
                                                ?>'><?php echo($i); ?></a>
                                            </li>
                                        <?php } else { ?>
                                            <li>
                                                <a href='res_reporte.php?pagina=<?php
                                                echo($i);
                                                if (isset($_GET['mias'])) {
                                                    echo('&mias=true');
                                                }
                                                ?>'><?php echo($i); ?></a>
                                            </li>
                                        <?php }
                                    } ?>
                                    <li><a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                                </ul>
                            </nav>
                        <?php } ?>
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>ID Casa</th>
                                <?php if($_SESSION['admin']) { ?>
                                <th>Locatario</th>
                                <th>Dueño</th>
                                <?php } else if(!isset($_GET['mias'])) { ?>
                                <th>Locatario</th>
                                <?php } else { ?>
                                <th>Dueño</th>
                                <?php } ?>
                                <th>Estado</th>
                                <th>Fecha Desde</th>
                                <th>Fecha Hasta</th>
                                <th>Observaci&oacute;n</th>
                                <th>Valor</th>
                            </tr>
                            <?php
                            if ($_SESSION['admin']) {
                                $reservas = $reservaRepository->getAllByPage($inicio, $cantidadPorPagina);
                            } else {
                                $idUsuario = $_SESSION['id'];
                                $usuarioRepository = new UsuarioRepository();
                                $usuario = $usuarioRepository->getOne($idUsuario);
                                $idPersona = $usuario->getIdPersona();
                                if (!isset($_GET['mias'])) {
                                    $casaRepository = new CasaRepository();
                                    $casas = $casaRepository->getAllByPersona($idPersona);
                                    $reservas = $reservaRepository->getAllByCasasAndPage($casas, $inicio, $cantidadPorPagina);
                                } else {
                                    $reservas = $reservaRepository->getAllByPersonaAndPage($idPersona, $inicio, $cantidadPorPagina);
                                }
                            }
                            foreach ($reservas as $r) {
                                $personaRepository = new PersonaRepository();
                                $locatario = $personaRepository->getOne($r->getIdPersonaReserva());
                                $estadoRepository = new EstadoRepository();
                                $estado = $estadoRepository->getOne($r->getIdEstado());
                                $casaRepository = new CasaRepository();
                                $casa = $casaRepository->getOne($r->getIdCasa());
                                $duenio = $personaRepository->getOne($casa->getIdPersona());
                                ?>
                                <tr>
                                    <td>
                                        <?php echo($r->getId()); ?>
                                    </td>
                                    <td>
                                        <?php echo($r->getIdCasa()); ?>
                                    </td>
                                    <?php if($_SESSION['admin']) { ?>
                                        <td>
                                            <?php echo($locatario->getNombre() . ' ' . $locatario->getApellido()); ?>
                                        </td>
                                        <td>
                                            <?php echo($duenio->getNombre() . ' ' . $duenio->getApellido()); ?>
                                        </td>
                                    <?php } else if(!isset($_GET['mias'])) { ?>
                                        <td>
                                            <?php echo($locatario->getNombre() . ' ' . $locatario->getApellido()); ?>
                                        </td>
                                    <?php } else { ?>
                                        <td>
                                            <?php echo($duenio->getNombre() . ' ' . $duenio->getApellido()); ?>
                                        </td>
                                    <?php } ?>
                                    <td>
                                        <?php echo($estado->getNombre()); ?>
                                    </td>
                                    <td>
                                        <?php echo($r->getFechaDesde()); ?>
                                    </td>
                                    <td>
                                        <?php echo($r->getFechaHasta()); ?>
                                    </td>
                                    <td>
                                        <?php echo($r->getObservacion()); ?>
                                    </td>
                                    <td>
                                        <?php echo($r->getValor()); ?>
                                    </td>
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