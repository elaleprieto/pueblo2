(function() {
  var App,
    __indexOf = [].indexOf || function(item) { for (var i = 0, l = this.length; i < l; i++) { if (i in this && this[i] === item) return i; } return -1; };

  App = angular.module('App', ['$strap.directives']);

  /* *******************************************************************************************************************
  			Definición de variables
  *******************************************************************************************************************
  */


  App.value('$strapConfig', {
    datepicker: {
      language: 'es'
    }
  });

  App.directive('file', function() {
    return {
      scope: {
        file: '='
      },
      link: function(scope, el, attrs) {
        return el.bind('change', function(event) {
          var file, files;
          files = event.target.files;
          file = files[0];
          scope.$parent.file = file ? file.name : null;
          return scope.$apply();
        });
      }
    };
  });

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
        return $('#formulario').submit();
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
