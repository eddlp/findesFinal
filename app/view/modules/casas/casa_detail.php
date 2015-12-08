<div class="container principal" ng-controller="CasaDetailController">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div>
            <h3>Imagenes</h3>
                <img src="view/images/casa/test-casa-detail.jpg" alt="" style="width: 100%">
            </div>
            <div class="row">
                <div class="col-md-2 col-xs-2 miniaturas">
                  <h4>img1</h4>
                </div>
                <div class="col-md-2 col-xs-2 miniaturas">
                    <h4>img2</h4>
                </div>
                <div class="col-md-2 col-xs-2 miniaturas">
                    <h4>img3</h4>
                </div>
                <div class="col-md-2 col-xs-2 miniaturas">
                    <h4>img4</h4>
                </div>
                <div class="col-md-2 col-xs-2 miniaturas">
                    <h4>img5</h4>
                </div>
            </div>

        </div>
        <div class="col-md-4 col-xs-12">
            <h3>Informacion principal</h3>
            <ul>
                <hr>
                <li>Direccion:</li>
                <hr>
                <li>Capacidad:</li>
                <hr>
                <li>Dormitorios:</li>
                <hr>
                <li>Ambientes:</li>
                <hr>
                <li>Banos:</li>
                <hr>
                <li>Superficie:</li>
                <hr>

            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h4>Caracteristicas</h4>
            <p><span class="glyphicon glyphicon-star"></span>  Pileta</p>
            <p><span class="glyphicon glyphicon-star"></span>  Solarium</p>
            <p><span class="glyphicon glyphicon-star"></span>  Parrillero</p>
        </div>
        <div class="col-md-4 col-xs-12">
            <!--Se muestra solo si no se definio previamente el intervalo de fechas de reserva-->
            <div>
                <h4>Verificar Disponibilidad</h4>
                <form action="">
                    <div class="control-group">
                        <label for="date-picker-3" class="control-label">Desde</label>
                        <div class="controls">
                            <div class="input-group">
                                <label for="fechadesde" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                <input id="fechadesde" type="text" class="date-picker form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="date-picker-3" class="control-label">Hasta</label>
                        <div class="controls">
                            <div class="input-group">
                                <label for="fechahasta" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                <input id="fechahasta" type="text" class="date-picker form-control" />
                            </div>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Verificar</button>
                </form>
            </div>
            <hr>
            <!--Se muestra solo si se definio previamente el intervalo de fechas de reserva-->

            <h4>Confirmar reserva para fecha:</h4>
            <p>Desde dd/mm/aaaa hasta dd/mm/aaaa</p>
            <form action="">
                <button type="submit" class="btn btn-success">RESERVAR AHORA</button>
            </form>

        </div>
    </div>
</div>