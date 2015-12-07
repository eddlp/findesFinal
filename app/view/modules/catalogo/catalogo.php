<div class="container principal" ng-controller="CatalogoController">
    <div class="row catalogo ">
        <div ng-init="casas=[
                    {domicilio:'Jose Ingenieros 1679', capacidad:'11', ambientes:'4',banios:'3',dormitorios:'4', img1:'test', superficie:'890'},
                    {domicilio:'Gorriti 321', capacidad:'7', ambientes:'4',banios:'2',dormitorios:'4', img1:'test', superficie:'650'},
                    {domicilio:'Francia 122', capacidad:'10', ambientes:'6',banios:'3',dormitorios:'4', img1:'test', superficie:'800'},
                    {domicilio:'Orono 321', capacidad:'10', ambientes:'4',banios:'2',dormitorios:'3', img1:'test', superficie:'925'},
                    {domicilio:'Jose Ingenieros 1679', capacidad:'11', ambientes:'4',banios:'4',dormitorios:'5', img1:'test', superficie:'534'},
                    ]"></div>
        <h2 class="titulo-catalogo">CATALOGO DE CASAS</h2>
        <div class="col-md-3 buscador">
            <h3 class="titulo-buscador">BUSCADOR DE CASAS</h3>
            <hr>
            <h4 class="disponibilidad">Ya sabes cuando alquilar?</h4><br>
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
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <hr>
            <label>Direccion<br><input ng-model="search.domicilio"></label><br>
            <label>Capacidad<br><input ng-model="search.capacidad"></label><br>
            <label>Dormitorios<br><input ng-model="search.dormitorios"></label><br>
            <label>Ambientes<br><input ng-model="search.ambientes"></label><br>
            <label>Banos<br><input ng-model="search.banios"></label><br>
            <label>Superficie<br><input ng-model="search.superficie"></label><br>
            <label>Estrictamente <input type="checkbox" ng-model="strict"></label><br>

        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3" ng-repeat="casa in casas | filter:search:strict ">
                    <div class="thumbnail casas">
                        <img class="casa" src="view/images/casa/casa.jpg" alt="">
                        <hr>
                        <h4 class="detalle">Direccion:</h4><p>{{casa.domicilio}}</p>
                        <h4 class="detalle">Capacidad:</h4><p>{{casa.capacidad}}</p>
                        <h4 class="detalle">Dormitorios:</h4><p>{{casa.dormitorios}}</p>
                        <h4 class="detalle">Ambientes:</h4><p>{{casa.ambientes}}</p>
                        <h4 class="detalle">Banos: </h4><p>{{casa.banios}}</p>
                        <h4 class="detalle">Superficie:</h4><p>{{casa.superficie}}</p>
                        <hr>
                        <a href="casa_detail.php">Ver detalles</a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
