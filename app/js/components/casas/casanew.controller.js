'use strict';

angular.module('findes')
    .controller('CasaNewController', function ($scope) {
        $scope.init = function() {
            console.log("Holaaa")
        };
        $scope.init();

        $( "#formCasaNew" ).validate({
            lang: 'es',
            rules: {
                direccion: {
                    required: true
                },
                capacidad: {
                    required: true,
                    number:true
                },
                dormitorios: {
                    required: true,
                    number:true
                },
                ambientes: {
                    required: true,
                    number:true
                },
                banios: {
                    required: true,
                    number:true
                },
                superficie: {
                    required: true,
                    number:true
                },
                valor:{
                    required:true,
                    number:true
                },
                img1:{
                    extension: "jpg|png|jpeg"
                },
                img2:{
                    extension: "jpg|png|jpeg"
                },
                img3:{
                    extension: "jpg|png|jpeg"
                },
                img4:{
                    extension: "jpg|png|jpeg"
                },
                img5:{
                    extension: "jpg|png|jpeg"
                }
            }
        });
    });
