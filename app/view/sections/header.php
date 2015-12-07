<?php session_start() ?>
<nav class="navbar navbar-default" >
    <div class="container-fluid">
        <div class="navbar-header">
            <h2 class="findes">Findes</h2>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav izquierda" ng-controller="NavbarController">
                    <li class="home-link activo"><a href="index.php" ng-click="link('home')">Home  </a></li>
                    <li class="qsomos-link"><a href="about.php" ng-click="link('qsomos')">Quienes somos</a></li>
                    <li class="catalogo-link"><a href="catalogo.php" ng-click="link('catalogo')">ENCONTRA TU CASA AHORA!</a></li>
                </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($_SESSION['admin']) && $_SESSION['admin']) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Menu Administrador <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="user_admin_entities.php">Administrar Entidades</a></li>
                    </ul>
                </li>
                <?php }
                if(isset($_SESSION['id'])) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Menu Usuario <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php if(!$_SESSION['admin']) { ?>
                            <li><a href="casa_new.php">Publicar mi casa</a></li>
                            <li><a href="casa_list.php">Mis casas publicadas</a></li>
                            <li role="separator" class="divider"></li>
                        <?php } ?>
                        <li><a href="user_signup.php">Mi cuenta</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="controller/usuario/usuario_logout.php">Cerrar sesion</a></li>
                    </ul>
                </li>
                <?php } else { ?>
                    <li><a href="user_signin.php">Sign In</a></li>
                    <li><a href="user_signup.php">Sign Up</a></li>
                <?php } ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>