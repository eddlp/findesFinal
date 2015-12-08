<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    <title>Catalogo de casas</title>
    <?php
    require'view/sections/links.html';
    ?>

</head>
<body ng-app="findes"  data-ng-controller="CatalogoController">
    <?php
    require'view/sections/header.php';
    ?>
    <div class="wrapper-index">
        <?php
        require'view/modules/catalogo/catalogo.php';
        ?>
        <div class="clearfooter"></div>
    </div>
    <?php
    require'view/sections/footer.php';
    require'view/sections/scripts.html';
    ?>
</body>
</html>