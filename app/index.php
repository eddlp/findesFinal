<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

    use app\model\estado;
    use app\repository\estadoRepository;
    $estado=new Estado();
    $estadoRepository = new app\repository\estadoRepository();
    $estado = $estadoRepository->getOne(1);
    echo $estado->getNombre();

?>
</body>
</html>