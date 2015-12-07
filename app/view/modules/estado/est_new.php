<?php
    use app\model\Estado;
    use app\repository\EstadoRepository;

    require_once('repository/EstadoRepository.php');
    require_once('repository/Connection.php');
    require_once('model/Estado.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $estado = new Estado();
            $estadoRepository = new EstadoRepository();
            $estado = $estadoRepository->getOne($id);
            $nombre = $estado->getNombre();
        }
    ?>
    <div class="container principal">
        <div class="row">
            <div class="col-md-6">
                <h3>Agregar estado</h3>
                <form role="form" method="post" action="controller/estado/estado_update.php">
                    <?php if (isset($id)) { ?>
                    <div class="form-group" hidden>
                        <label for="id">ID</label>
                        <input type="text" class="form-control" id="id"
                               name="id" value="<?php echo($id)?>">
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre"
                               <?php if (isset($nombre)) { ?>
                                    value="<?php echo($nombre)?>">
                               <?php } else { ?>
                                   placeholder="Introduce el nombre del estado">
                               <?php } ?>
                    </div>
                    <button type="submit" class="btn btn-default">Confirmar</button>
                    <button type="submit" class="btn btn-default">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>