'use strict';

angular.module('findes')
    .controller('SignInController', function ($scope) {
        $scope.init = function() {

        };
        $scope.init();

        $( "#formLogin" ).validate({
            lang: 'es',
            rules: {
                email: {
                    required: true
                },
                pass: {
                    required: true
                }
            }
        });
    });
