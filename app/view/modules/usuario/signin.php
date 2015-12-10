<?php
    if(!isset($_SESSION['id'])) {
?>
<div class="container principal"  ng-controller="SignInController">
    <div class="row">
        <h2 class="titulo-sesion">Iniciar sesion</h2>
        <hr>
        <div class="col-md-7 col-xs-12">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sed lorem at quam malesuada luctus.
                Integer malesuada est orci, at sollicitudin erat aliquam sed.
                Nullam nisl nisl, convallis ac nunc ut,
                pulvinar suscipit libero. Pellentesque placerat ante in justo viverra, vel rhoncus lectus fringilla.</p>
        </div>
        <div class="col-md-5 col-xs-12">
            <form  method="post" id="formLogin" action="controller/usuario/usuario_login.php">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           placeholder="Introduce tu email">
                </div>
                <div class="form-group">
                    <label for="pass">Contrase&#241;a</label>
                    <input type="password" class="form-control" id="pass" name="pass"
                           placeholder="Introduce tu contrase&#241;a">
                </div>

                <?php if(isset($_SESSION['errorSesion'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>
                        Email o contrase&#241;a incorrecta.
                    </div>
                <?php }  unset($_SESSION['errorSesion']);?>

                <a href="user_signup.php"><p>Quiero registrarme</p></a>
                <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div>
    </div>
</div>
<?php } else {
    $_SESSION['error'] = "Usted ya está logueado";
    header("location: error.php");
} ?>