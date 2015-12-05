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

    $estado = new Estado();
    $estadoRepository = new EstadoRepository();
    $estado = $estadoRepository->getOne(1);
    echo $estado->getNombre();

?>

</body>
</html>