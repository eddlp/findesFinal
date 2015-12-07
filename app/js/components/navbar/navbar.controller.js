'use strict';

angular.module('findes')
    .controller('NavbarController', function ($scope) {
        $scope.init = function() {
            console.log("adfadfasdfasdf");
        };
        $scope.init();

        //TODO terminar esta funcion para las opciones del navbar
        $scope.link = function(content){
            $('.'+content+"-link").addClass("activo");

        };
    });
