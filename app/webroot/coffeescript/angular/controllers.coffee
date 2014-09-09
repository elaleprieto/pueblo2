App = angular.module('App', ['$strap.directives'])

### *******************************************************************************************************************
      Tracks
******************************************************************************************************************* ###
App.controller 'TracksController', ($scope, $http, $timeout) ->
	$scope.mensaje = {}

	$scope.getMedias = ->
		aux = []
		angular.forEach $scope.added, (video, index) ->
			aux.push video.Track.entryId
		angular.forEach $scope.medias, (media, index) ->
			if media.id in aux
				$scope.medias.splice(index, 1)
		$scope.medias

	$scope.getImagenes = ->
		aux = []
		angular.forEach $scope.added, (video, index) ->
			aux.push video.Track.portadaId
		angular.forEach $scope.imagenes, (imagen, index) ->
			if imagen.id in aux
				$scope.imagenes.splice(index, 1)
		$scope.imagenes

	$scope.selectVideo = (media) ->
		$scope.entryId = media.id	
		$scope.selectedVideo = media
  
	$scope.selectImagen = (imagen) ->
		$scope.portadaId = imagen.id	
		$scope.selectedImagen = imagen
  
	$scope.submit = (event) ->
		event.preventDefault()
		window.location = '#'
		$scope.mensaje.text = 'Enviando el formulario...'
		$scope.mensaje.tag = 'info'
		if $scope.formulario.$valid
			$.post('/cargador', $('#formulario').serialize())
				.error () ->
					$scope.mensaje.text = 'Ocurrió un error enviando el formulario. Por favor, verifique los datos e intente nuevamente.'
					$scope.mensaje.tag = 'danger'
					$scope.$apply()
				.success (data) ->
					$scope.mensaje.text = 'Formulario enviado correctamente.'
					$scope.mensaje.tag = 'success'
					$('#formulario')[0].reset()
					$('#tags1').importTags('ejemplo');
					$scope.$apply()
					$timeout () -> 
						$scope.mensaje.text = ''
					, 5000
					window.location = '/tracks/index'
		else
			$scope.mensaje.text = 'Verifique el Formulario.'
			$scope.mensaje.tag = 'danger'

	$scope.init = ->
		$scope.getMedias()

	$timeout () -> 
		$scope.init()
	, 200
	