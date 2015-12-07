<?php
    use app\repository\CaracteristicaRepository;
    use app\repository\EstadoRepository;

    require_once('repository/CaracteristicaRepository.php');
    require_once('repository/Connection.php');
    require_once('repository/EstadoRepository.php');
    require_once('model/Caracteristica.php');
    require_once('model/Estado.php');

    if(isset($_SESSION['id']) && $_SESSION['admin']) {
?>
<div class="container principal">
    <div class="row">
        <h3>Listado de Caracter&iacute;sticas</h3>
        <div class="col-md-12">
            <a href="carac_new.php" class="btn btn-primary" role="button">
                <span class="glyphicon glyphicon-plus"></span> Agregar Caracter&iacute;stica
            </a><br><br>
            <table class="table">
                <tr>
                    <th>ID </th>
                    <th>Nombre </th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    $estadoRepository = new EstadoRepository();
                    $estado = $estadoRepository->getOneByName("Valida");
                    $caracteristicaRepository = new CaracteristicaRepository();
                    $caracteristicas = $caracteristicaRepository->getAllByEstado($estado->getId());
                    foreach ($caracteristicas as $c) {
                ?>
                <tr>
                    <td>
                        <?php echo($c->getId());?>
                    </td>
                    <td>
                        <?php echo($c->getNombre());?>
                    </td>
                    <td>
                        <a href="carac_new.php?id=<?php echo($c->getId());?>">
                            <span class="glyphicon glyphicon-edit"></span> Editar
                        </a>
                    </td>
                    <td>
                        <a href="controller/caracteristica/caracteristica_baja.php?id=<?php echo($c->getId());?>">
                            <span class="glyphicon glyphicon-remove"></span> Eliminar
                        </a>
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