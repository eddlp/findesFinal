'use strict';

angular.module('findes')
    .controller('SignupController', function ($scope) {
        $scope.init = function() {
            console.log("Signup");
        };
        $scope.init();

        $( "#formUser" ).validate({
            lang: 'es',
            rules: {
                email: {
                    required: true
                },
                user: {
                    required: true
                },
                pass: {
                    required: true
                },
                repass: {
                    required: true
                },
                nombre: {
                    required: true,
                    onlyString:true
                },
                apellido: {
                    required: true,
                    onlyString:true
                },
                dni: {
                    required: true,
                    number:true
                },
                localidad: {
                    required: true,
                    onlyString:true
                },
                dir: {
                    required: true
                },
                tel1: {
                    required: true,
                    number:true
                },
                tel2: {
                    number:true
                }

            }
        });
    });
