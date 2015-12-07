<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Caracteristicas de casa</title>
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
        require'view/modules/caracteristicas/carac_casa_new.php';
        require'view/sections/footer.php';
        require'view/sections/scripts.html';
        ?>
    </div>
</body>
</html>