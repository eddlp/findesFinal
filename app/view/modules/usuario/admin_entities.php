<?php
    if(isset($_SESSION['id']) && $_SESSION['admin']) {
?>
<div class="container principal adminEntities">
    <div class="row">
        <div class="row">
            <h2 class="adminE">Administrador de Entidades</h2>
            <hr>
            <div class="col-md-6 col-xs-12 izquierda">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed lorem at quam malesuada luctus.
                    Integer malesuada est orci, at sollicitudin erat aliquam sed.
                    Nullam nisl nisl, convallis ac nunc ut,
                    pulvinar suscipit libero. Pellentesque placerat ante in justo viverra, vel rhoncus lectus fringilla.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed lorem at quam malesuada luctus.
                    Integer malesuada est orci, at sollicitudin erat aliquam sed.
                    Nullam nisl nisl, convallis ac nunc ut,
                    pulvinar suscipit libero. Pellentesque placerat ante in justo viverra, vel rhoncus lectus fringilla.</p>
            </div>
            <div class="col-md-6 col-xs-12 derecha">
                <ul>
                    <h4><span class="glyphicon glyphicon-th"></span> General</h4>
                    <li>
                        <a href="est_list.php">Estados</a>
                    </li>

                    <hr>
                    <h4><span class="glyphicon glyphicon-user"></span> Usuarios</h4>
                    <li>
                        <a href="user_list.php">Habilitar/Deshabilitar usuario</a>
                    </li>

                    <hr>
                    <h4> <span class="glyphicon glyphicon-calendar"></span> Reservas</h4>
                    <li>
                        <a href="res_reporte.php">Listado de Reservas</a>
                    </li>

                    <hr>
                    <h4> <span class="glyphicon glyphicon-home"></span> Casas</h4>
                    <li>
                        <a href="casa_list.php">Habilitar/Deshabilitar publicaciones</a>
                    </li>
                    <li>
                        <a href="carac_list.php">Caracter&iacute;sticas</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
<?php } else {
    $_SESSION['error'] = "Acceso denegado";
    header("location: error.php");
} ?>