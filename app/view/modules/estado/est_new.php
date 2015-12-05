<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

    use app\model\Estado;
    use app\repository\EstadoRepository;

    require_once('repository/EstadoRepository.php');
    require_once('model/Estado.php');

    echo('Test getOne');
    echo('<br>');
    $estado = new Estado();
    $estadoRepository = new EstadoRepository();
    $estado = $estadoRepository->getOne(1);
    echo($estado->getNombre());
    echo('<br>');

    echo('Test getAll');
    echo('<br>');
    echo('<table><tr><th>Id</th><th>Nombre</th></tr>');
    $estados = $estadoRepository->getAll();
    foreach ($estados as $e) {
        echo('<tr>');
        echo('<td>');
        echo($e->getId());
        echo('</td>');
        echo('<td>');
        echo($e->getNombre());
        echo('</td>');
        echo('</tr>');
    }
    echo ('</table>');

    echo('Test save');
    echo('<br>');
    $estado = new Estado();
    $estado->setNombre("Estado test");
    $message = $estadoRepository->save($estado);
    echo($message);
    echo('<br>');

    echo('Test delete');
    echo('<br>');
    $message = $estadoRepository->delete(8);
    echo($message);
    echo('<br>');
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form role="form">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre"
                           placeholder="Introduce tu email">
                </div>

                <button type="submit" class="btn btn-default">Confirmar</button>
                <button type="submit" class="btn btn-default">Cancelar</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>