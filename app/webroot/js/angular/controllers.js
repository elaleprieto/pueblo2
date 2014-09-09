(function() {
  var App,
    __indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };

  App = angular.module('App', ['$strap.directives']);

  /* *******************************************************************************************************************
        Tracks
  *******************************************************************************************************************
  */


  App.controller('TracksController', function($scope, $http, $timeout) {
    $scope.mensaje = {};
    $scope.getMedias = function() {
      var aux;
      aux = [];
      angular.forEach($scope.added, function(video, index) {
        return aux.push(video.Track.entryId);
      });
      angular.forEach($scope.medias, function(media, index) {
        var _ref;
        if (_ref = media.id, __indexOf.call(aux, _ref) >= 0) {
          return $scope.medias.splice(index, 1);
        }
      });
      return $scope.medias;
    };
    $scope.getImagenes = function() {
      var aux;
      aux = [];
      angular.forEach($scope.added, function(video, index) {
        return aux.push(video.Track.portadaId);
      });
      angular.forEach($scope.imagenes, function(imagen, index) {
        var _ref;
        if (_ref = imagen.id, __indexOf.call(aux, _ref) >= 0) {
          return $scope.imagenes.splice(index, 1);
        }
      });
      return $scope.imagenes;
    };
    $scope.selectVideo = function(media) {
      $scope.entryId = media.id;
      return $scope.selectedVideo = media;
    };
    $scope.selectImagen = function(imagen) {
      $scope.portadaId = imagen.id;
      return $scope.selectedImagen = imagen;
    };
    $scope.submit = function(event) {
      event.preventDefault();
      window.location = '#';
      $scope.mensaje.text = 'Enviando el formulario...';
      $scope.mensaje.tag = 'info';
      if ($scope.formulario.$valid) {
        return $.post('/cargador', $('#formulario').serialize()).error(function() {
          $scope.mensaje.text = 'Ocurrió un error enviando el formulario. Por favor, verifique los datos e intente nuevamente.';
          $scope.mensaje.tag = 'danger';
          return $scope.$apply();
        }).success(function(data) {
          $scope.mensaje.text = 'Formulario enviado correctamente.';
          $scope.mensaje.tag = 'success';
          $('#formulario')[0].reset();
          $('#tags1').importTags('ejemplo');
          $scope.$apply();
          $timeout(function() {
            return $scope.mensaje.text = '';
          }, 5000);
          return window.location = '/tracks/index';
        });
      } else {
        $scope.mensaje.text = 'Verifique el Formulario.';
        return $scope.mensaje.tag = 'danger';
      }
    };
    $scope.init = function() {
      return $scope.getMedias();
    };
    return $timeout(function() {
      return $scope.init();
    }, 200);
  });

}).call(this);
