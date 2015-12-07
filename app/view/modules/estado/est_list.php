<?php
    use app\repository\EstadoRepository;
    require_once('repository/EstadoRepository.php');
    require_once('model/Estado.php');
    require_once('repository/Connection.php');

    if(isset($_SESSION['id']) && $_SESSION['admin']) {
?>

<div class="container principal">
    <div class="row">
        <h3>Listado de Estados</h3>
        <div class="col-md-12">
            <a href="est_new.php" class="btn btn-primary" role="button">
                <span class="glyphicon glyphicon-plus"></span> Agregar estado
            </a><br><br>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                    $estadoRepository = new EstadoRepository();
                    $estados = $estadoRepository->getAll();
                    foreach ($estados as $e) {
                ?>
                <tr>
                    <td>
                        <?php echo($e->getId());?>
                    </td>
                    <td>
                        <?php echo($e->getNombre());?>
                    </td>
                    <td>
                        <a href="est_new.php?id=<?php echo($e->getId());?>">
                            <span class="glyphicon glyphicon-edit"></span> Editar
                        </a>
                    </td>
                    <td>
                        <a href="controller/estado/estado_baja.php?id=<?php echo($e->getId());?>">
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