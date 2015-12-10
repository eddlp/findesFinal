<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>Detalle de casa</title>
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
        require'view/modules/casas/casa_detail.php';
        ?>
        <div class="clearfooter"></div>
    </div>
    <?php
    require'view/sections/footer.php';
    require'view/sections/scripts.html';
    ?>
</body>
</html>