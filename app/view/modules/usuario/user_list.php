<?php
    use app\repository\UsuarioRepository;
    require_once('repository/UsuarioRepository.php');
    require_once('repository/Connection.php');
    require_once('model/Usuario.php');
?>
<div class="container">
    <div class="row">
        <h3>Listado de Usuarios</h3>
        <div class="col-md-12">
            <form role="form" method="post" action="controller/usuario/usuario_habilitacion.php">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Habilitado</th>
                </tr>
                <?php
                    $usuarioRepository = new UsuarioRepository();
                    $usuarios = $usuarioRepository->getAll();
                    foreach ($usuarios as $u) {
                ?>
                <tr>
                    <td>
                        <?php echo($u->getId());?>
                    </td>
                    <td>
                        <?php echo($u->getUsername());?>
                    </td>
                    <td>
                        <?php echo($u->getEmail());?>
                    </td>
                    <td>
                        <input type="checkbox" name="<?php echo($u->getId());?>"
                            <?php if($u->getHabilitado()) {
                                echo('checked>');
                            }
                            ?>
                    </td>
                </tr>
                <?php } ?>
            </table>
                <button type="submit" class="btn btn-success">Guardar</button>
                </form>


        </div>
    </div>
</div>