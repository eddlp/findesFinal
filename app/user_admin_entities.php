<!DOCTYPE html>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Panel de control administrador</title>
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
        require'view/modules/usuario/admin_entities.php';
        require'view/sections/footer.php';
        require'view/sections/scripts.html';
        ?>
    </div>
</body>
</html>