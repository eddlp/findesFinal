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
                    <div class="form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control" id="asunto"
                               name="asunto" placeholder="Ingrese el asunto del mail">
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <input type="text" class="form-control" id="mensaje"
                               name="mensaje" placeholder="Ingrese el mensaje del mail">
                    </div>
                    <button type="submit" class="btn btn-default">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>