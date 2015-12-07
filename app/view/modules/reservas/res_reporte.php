 <?php
    use app\repository\ReservaRepository;
    require_once('repository/ReservaRepository.php');
    require_once('repository/Connection.php');
    require_once('model/Reserva.php');

     if(isset($_SESSION['id']) && $_SESSION['admin']) {
?>
<div class="container principal">
    <div class="row">
        <h3>Listado de Reservas</h3>
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>ID </th>
                    <th>ID Casa</th>
                    <th>Nombre Locatario </th>
                    <th>Estado</th>
                    <th>Fecha Desde</th>
                    <th>Fecha Hasta</th>
                    <th>Observaci&oacute;n</th>
                    <th>Valor</th>
                </tr>
                <?php
                    $reservaRepository = new ReservaRepository();
                    $reservas = $reservaRepository->getAll();
                    foreach ($reservas as $r) {
                ?>
                <tr>
                    <td>
                        <?php echo($r->getId());?>
                    </td>
                    <td>
                        <?php echo($r->getIdCasa());?>
                    </td>
                    <td>
                        <?php echo($r->getIdPersonaReserva());?>
                    </td>
                    <td>
                        <?php echo($r->getIdEstado());?>
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