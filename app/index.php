<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php
    require'view/sections/links.html';
    ?>
</head>
<body>
    <?php
    require'view/sections/header.php';
    ?>
    <div class="wrapper-index index">
        <?php
        require'view/modules/index.php';
        ?>
        <div class="clearfooter"></div>
    </div>
    <?php
    require'view/sections/footer.php';
    require'view/sections/scripts.html';
    ?>
</body>
</html>