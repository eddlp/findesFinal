<div class="container principal" ng-controller="CatalogoController">
    <div class="row catalogo ">
        <h2 class="titulo-catalogo">CATALOGO DE CASAS</h2>
        <div class="col-md-3 buscador">
            <h3 class="titulo-buscador">BUSCADOR DE CASAS</h3>
            <hr>
            <h4 class="disponibilidad">Ya sabes cuando alquilar?</h4><br>

                <div class="control-group">
                    <label for="date-picker-3" class="control-label">Desde</label>
                    <div class="controls">
                        <div class="input-group">
                            <label for="fechadesde" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                            <input id="fechadesde" type="text" class="date-picker form-control" ng-model="fechadesde" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label for="date-picker-3" class="control-label">Hasta</label>
                    <div class="controls">
                        <div class="input-group">
                            <label for="fechahasta" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                            <input id="fechahasta" type="text" class="date-picker form-control"  ng-model="fechahasta" />
                        </div>
                    </div>
                </div>
                <br>
                <button ng-click="actualizarCatalogo(fechadesde,fechahasta)"  class="btn btn-primary">Buscar</button>

            <hr>
            <label>Direccion<br><input ng-model="search.domicilio"></label><br>
            <label>Capacidad<br><input ng-model="search.capacidad"></label><br>
            <label>Dormitorios<br><input ng-model="search.dormitorios"></label><br>
            <label>Ambientes<br><input ng-model="search.ambientes"></label><br>
            <label>Banos<br><input ng-model="search.banios"></label><br>
            <label>Superficie<br><input ng-model="search.superficie"></label><br>

        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3" ng-repeat="casa in casas | toArray:false | filter:search:strict">
                    <div class="thumbnail casas">
                        <img ng-src='imagenesCasas/{{casa.img1}}' alt="imagendecasa">
                        <hr>
                        <h4 class="detalle">Direcci&oacute;n:</h4><p class="direccion">{{casa.direccion}}</p>
                        <h4 class="detalle">Capacidad:<span class="item">&nbsp;&nbsp;{{casa.capacidad}}</span></h4>
                        <h4 class="detalle">Dormitorios:<span class="item">&nbsp;&nbsp;{{casa.dormitorios}}</span></h4>
                        <h4 class="detalle">Ambientes:<span class="item">&nbsp;&nbsp;{{casa.ambientes}}</span></h4>
                        <h4 class="detalle">Ba&#241;os: <span class="item">&nbsp;&nbsp;{{casa.banios}}</span></h4>
                        <h4 class="detalle">Superficie:<span class="item">&nbsp;&nbsp;{{casa.dormitorios}}</span></h4>
                        <hr class="detalle">
                        <a ng-href="casa_detail.php?idCasa={{casa.id}}">Ver detalles</a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
