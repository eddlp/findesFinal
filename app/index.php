<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php

    include("repository/estadoRepository.php");
    include("model/estado.php");

    $estado =new \app\model\estado();
    $estadoRepository = new \app\repository\estadoRepository();
    $estado = $estadoRepository->getOne(1);
    echo $estado->getNombre();

?>
</body>
</html>