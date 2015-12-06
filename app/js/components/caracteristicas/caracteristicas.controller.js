'use strict';

angular.module('findes')
    .controller('CaracteristicasController', function ($scope) {
        $scope.init = function() {

        };
        $scope.init();

        $( "#caractAlta" ).validate({
            lang: 'es',
            rules: {
                nombre: {
                    required: true,
                    lettersonly:true
                }
            }
        });

    });
