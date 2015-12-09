'use strict';

angular.module('findes')
.controller('CatalogoController', function ($scope,$rootScope, $http) {

$scope.init = function() {
    $http({
        url: "controller/catalogo/catalogoGetAll.php",
        method: "POST"
    }).success(function(data, status, headers, config) {
            $scope.casas=data;
    }).error(function(data, status, headers, config) {
        $scope.status = status;
    });
};
$scope.init();

$scope.actualizarCatalogo = function(fechaDesde, fechaHasta){
    $http({
        url: "controller/catalogo/catalogoUpdated.php",
        method: "POST",
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        data: $.param({
            fechaDesde: fechaDesde,
            fechaHasta: fechaHasta
        })
    }).success(function(data, status, headers, config) {
        $scope.casas = data;
    }).error(function(data, status, headers, config) {
        $scope.status = status;
    });
};


//_________________________________________________________________________
        $(function() {
            $.datepicker.regional['es'] =
            {
                closeText: 'Cerrar',
                prevText: 'Previo',
                nextText: 'Próximo',

                monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
                    'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
                monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
                    'Jul','Ago','Sep','Oct','Nov','Dic'],
                monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
                dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
                dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
                dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
                dateFormat: 'dd/mm/yy', firstDay: 0,
                initStatus: 'Selecciona la fecha', isRTL: false};
            $.datepicker.setDefaults($.datepicker.regional['es']);
            $( "#datepicker" ).datepicker({ minDate: "-1D", maxDate: "+1M +10D" });
        });
        $(".date-picker").datepicker({ dateFormat: 'dd-mm-yy' });
        $(".date-picker").on("change", function () {
            var id = $(this).attr("id");
            var val = $("label[for='" + id + "']").text();
            $("#msg").text(val + " changed");
        });
    });
