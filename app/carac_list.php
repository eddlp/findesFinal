<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Listado de Caracteristicas</title>
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
        require'view/modules/caracteristicas/carac_list.php';
        ?>
        <div class="clearfooter"></div>
    </div>
    <?php
    require'view/sections/footer.php';
    require'view/sections/scripts.html';
    ?>
</body>
</html>