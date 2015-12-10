<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>Reporte de reservas</title>
    <?php
    require'view/sections/links.html';
    ?>
</head>
<body ng-app="findes">
    <?php
    require'view/sections/header.php';
    ?>
    <div class="wrapper-index">
        <?php
        require'view/modules/reservas/res_reporte.php';
        require'view/sections/footer.php';
        require'view/sections/scripts.html';
        ?>
    </div>
</body>
</html>