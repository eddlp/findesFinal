<div class="row footer">
    <div class="container col-fot">
        <div class="row detalles">
            <div class="col-md-4 col-xs-12 columna ">
                <h2>Datos de contacto con la empresa</h2>
                <h3>Ciudad</h3>
                <p>Rosario, Prov. Santa Fe</p>
                <h3>Tel&eacute;fonos</h3>
                <p>(0341)4548793 / 4664133</p>
                <h3>Correo electr&oacute;nico</h3>
                <p>contacto@findes.com.ar</p>
            </div>
            <div class="col-md-4 col-xs-12 columna ">
                <h2>El sitio web</h2>
                <a href="index.php">Home</a><br>
                <a href="about.php">Quienes somos</a><br>
                <a href="faq.php">F.A.Q</a><br>
                <a href="catalogo.php">Encontr&aacute; la casa que buscas</a><br>
                <?php if(!isset($_SESSION['id'])) { ?>
                    <a href="user_signup.php">Registrate ahora</a><br>
                <?php } ?>
                <a href="mail.php">Cont&aacute;ctenos</a><br>
            </div>
            <div class="col-md-4 col-xs-12 columna ">
                <h2>Alcance</h2>
                <p>Momentaneamente el alcance de nuestro sistema se encuentra restringido a casa ubicadas
                    en la localidad de Funes, estamos trabajando para poder extendernos hacia las zonas aleda&#241;as.</p>
            </div>
        </div>

    </div>
    <div class="row copyright">
        <div class="col-md-12">
            <p>Creado por Adrian Trik y Esteban de la Pe&#241;a | Todos los derechos reservados 2015</p>
        </div>
    </div>
</div>