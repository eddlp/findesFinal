<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
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
        require 'view/modules/casaCaracteristica/casa_carac_new.php';
        ?>
        <div class="clearfooter"></div>
    </div>
    <?php
    require'view/sections/footer.php';
    require'view/sections/scripts.html';
    ?>
</body>
</html>