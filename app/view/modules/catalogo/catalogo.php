<div class="container" ng-controller="CatalogoController">
    <div class="row">
        <div ng-init="casas=[
                    {capacidad:'3', dormitorios:'1'},
                    {capacidad:'5', dormitorios:'3'},
                    {capacidad:'10', dormitorios:'4'},
                    {capacidad:'8', dormitorios:'2'}]"></div>
        <h2>CATALOGO DE CASAS</h2>
        <div class="col-md-3">
            <h3>BUSCADOR DE CASAS</h3>
            <label>Capacidad<input ng-model="search.capacidad"></label><br>
            <label>Dormitorios<input ng-model="search.dormitorios"></label><br>
            <label>Estrictamente <input type="checkbox" ng-model="strict"></label><br>
        </div>

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-3">


                    <div class="thumbnail" ng-repeat="casa in casas | filter:search:strict ">
                        <table class="table">
                            <th>Capacidad</th>
                            <th>Dormitorios</th>
                            <tr>
                                <td>{{casa.capacidad}}</td>
                                <td>{{casa.dormitorios}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
