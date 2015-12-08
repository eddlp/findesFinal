<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <div class="container principal">
        <div class="row">
            <div class="col-md-6">
                <form role="form" method="post" action="controller/mail/send_mail.php">
                    <?php if(isset($_GET['idCasa'])) { ?>
                    <div class="form-group" hidden>
                        <label for="idCasa">Casa</label>
                        <input type="text" class="form-control" id="idCasa"
                               name="idCasa" value="<?php echo($_GET['idCasa']);?>">
                    </div>
                    <?php } ?>
                    <div class="form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control" id="asunto"
                               name="asunto" placeholder="Ingrese el asunto del mail">
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea class="form-control" rows="5" id="mensaje"
                            placeholder="Ingrese el mensaje del mail" name="mensaje"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>