'use strict';

angular.module('findes')
    .controller('CasaDetailController', function ($scope, $http) {
        $scope.init = function() {

            $('#fecha-error').hide();
            $scope.ubicacion= $scope.img1;
        };


        $scope.init();

        $scope.showImg= function(img,content){
            $scope.ubicacion = img;
            $('.img-miniatura1').removeClass('seleccionada');
            $('.'+content).addClass('seleccionada');
        }

        $scope.verificarDisponibilidad = function(fechaDesde, fechaHasta, idCasa){
            if(fechaDesde<fechaHasta) {
                $http({
                    url: "controller/catalogo/catalogoGetOne.php",
                    method: "POST",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param({
                        fechaDesde: fechaDesde,
                        fechaHasta: fechaHasta,
                        idCasa: idCasa
                    })
                }).success(function (data, status, headers, config) {
                    $scope.disponible = data;
                    console.log(data);
                    console.log(headers);
                    console.log(config);

                }).error(function (data, status, headers, config) {

                });
            }else{
                $('#fecha-error').show();
            }
        };

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
