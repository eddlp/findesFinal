<div class="container">
    <div class="row">
        <h3>Iniciar sesion</h3>
        <div class="col-md-7 col-xs-12">
            <p>Texto de sanata</p>
        </div>
        <div class="col-md-5 col-xs-12">
            <form role="form" method="post" action="controller/usuario/usuario_login.php"">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                       placeholder="Introduce tu email">
            </div>
            <div class="form-group">
                <label for="pass">Contrase&#241;a</label>
                <input type="password" class="form-control" id="pass" name="pass"
                       placeholder="Contrase�a">
            </div>
                <a href="user_signup.php"><p>Quiero registrarme</p></a>
            <button type="submit" class="btn btn-default">Enviar</button>
            </form>
        </div>
    </div>
</div>