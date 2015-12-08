<div class="container principal errorContainer">
    <div class="row">
        <div class="col-md-12">
            <?php
            if(isset($_SESSION['error']))
            { ?>
                <div class="error">
                    <h4 class="error"><span class="glyphicon glyphicon-remove"></span>Error</h4>
                    <hr>
                    <h2>
                    <?php
                        echo ($_SESSION['error']);
                        unset($_SESSION['error']);
                    ?>
                    </h2>
                    <a href="index.php">Ir al inicio..</a><br>
                    <a href="javascript:history.go(-1);">Atras</a>
                </div>
            <?php } else { ?>
                <div class="ok">
                    <h1>No te preocupes, no pasó nada! Llegaste sin querer.</h1>
                    <a href="index.php">Ir al inicio..</a>
                    <a href="javascript:history.go(-1);">Atras</a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>