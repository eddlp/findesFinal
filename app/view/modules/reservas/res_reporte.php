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
?>
<div class="container principal">
    <div class="row">
        <h3>Listado de Reservas</h3>
         <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>ID Casa</th>
                    <th>Locatario</th>
                    <?php if($_SESSION['admin']){ ?>
                        <th>Dueño</th>
                    <?php } ?>
                    <th>Estado</th>
                    <th>Fecha Desde</th>
                    <th>Fecha Hasta</th>
                    <th>Observaci&oacute;n</th>
                    <th>Valor</th>
                </tr>
                <?php
                $reservaRepository = new ReservaRepository();
                if ($_SESSION['admin']) {
                    $reservas = $reservaRepository->getAll();
                } else {
                    $idUsuario = $_SESSION['id'];
                    $usuarioRepository = new UsuarioRepository();
                    $usuario = $usuarioRepository->getOne($idUsuario);
                    $casaRepository = new CasaRepository();
                    $casas = $casaRepository->getAllByPersona($usuario->getIdPersona());
                    $reservas = $reservaRepository->getAllByCasas($casas);
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
                        <?php echo($r->getId());?>
                    </td>
                    <td>
                        <?php echo($r->getIdCasa());?>
                    </td>
                    <td>
                        <?php echo($locatario->getNombre().' '.$locatario->getApellido());?>
                    </td>
                    <?php if($_SESSION['admin']){ ?>
                        <td>
                            <?php echo($duenio->getNombre().' '.$duenio->getApellido());?>
                        </td>
                    <?php } ?>
                    <td>
                        <?php echo($estado->getNombre());?>
                    </td>
                    <td>
                        <?php echo($r->getFechaDesde());?>
                    </td>
                    <td>
                        <?php echo($r->getFechaHasta());?>
                    </td>
                    <td>
                        <?php echo($r->getObservacion());?>
                    </td>
                    <td>
                        <?php echo($r->getValor());?>
                    </td>
                </tr>
                <?php } ?>
            </table>
         </div>
    </div>
</div>
<?php } else {
    $_SESSION['error'] = "Acceso denegado";
    header("location: error.php");
} ?>