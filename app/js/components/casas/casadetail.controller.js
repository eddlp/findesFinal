'use strict';

angular.module('findes')
    .controller('CasaDetailController', function ($scope, $http) {
        $scope.init = function() {

            $('#fecha-error').hide();
            $scope.ubicacion= $scope.img1;
            $('#confirmar').hide();
        };

        $scope.init();

        $scope.showImg= function(img,content){
            $scope.ubicacion = img;
            $('.img-miniatura1').removeClass('seleccionada');
            $('.'+content).addClass('seleccionada');
        }

        $scope.reservar= function(){
            $http({
                url: "controller/reserva/reserva_new.php",
                method: "POST",
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data: $.param({
                    fechaDesde: $scope.fechaDesde,
                    fechaHasta: $scope.fechaHasta,
                    idCasa: $scope.idCasaAngular,
                    idUsuario: $scope.idUsuario
                })
            }).success(function (data,status, headers, config) {
                window.location.href ="catalogo.php";

            }).error(function (data,status, headers, config) {

            });
        };

        $scope.verificarDisponibilidad = function(fechaDesde, fechaHasta, idCasa){
            if(fechaDesde<fechaHasta) {
                $('#fecha-error').hide();
                $http({
                    url: "controller/catalogo/catalogoGetOne.php",
                    method: "POST",
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    data: $.param({
                        fechaDesde: fechaDesde,
                        fechaHasta: fechaHasta,
                        idCasa: idCasa
                    })
                }).success(function (data, headers) {
                    $scope.disponible = data;
                    if(data==1){
                        $scope.fechaDesde=fechaDesde;
                        $scope.fechaHasta=fechaHasta;
                        $('#verificarcion').hide();
                        $('#confirmar').show();
                        $scope.mensajeExito=true;
                        $scope.mensajeError=false;

                    }else if(data==0) {
                        $('#verificarcion').show();
                        $('#confirmar').hide();
                        $scope.mensajeExito=false;
                        $scope.mensajeError=true;
                    }

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



        $scope.restaFechas = function(f1,f2) {
            var aFecha1 = f1.split('/');
            var aFecha2 = f2.split('/');
            var fFecha1 = Date.UTC(aFecha1[2], aFecha1[1] - 1, aFecha1[0]);
            var fFecha2 = Date.UTC(aFecha2[2], aFecha2[1] - 1, aFecha2[0]);
            var dif = fFecha2 - fFecha1;
            var dias = Math.floor(dif / (1000 * 60 * 60 * 24));
            return dias;
        }

    });
