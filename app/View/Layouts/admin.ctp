<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'Pueblo Cooperativo 2014');
$siteName = __d('site_name', 'Pueblo.Coop');
$siteLink = __d('site_link', 'http://pueblo.coop');
?>
<!DOCTYPE html>
<html lang="es-ES">
	<head>
		<?php echo $this->Html->charset(); ?>
		<title> <?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?> </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php
		// echo $this->Html->meta('icon');
		echo $this->Html->meta('favicon.ico', '/favicon.ico', array('type' => 'icon'));
		echo $this->Html->css(array(
			'vendor/bootstrap.min'
			, 'layouts/default'
			, 'vendor/bootstrap-datepicker'
		));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		?>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->

		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	</head>
	<body data-ng-app="App">
		<div class="container">

			<!-- Logo -->
			<div class="row">
				<div class="col-sm-12">
					<a href="http://www.tramaaudiovisual.com.ar">
						<img class="img-responsive logo-superior" src="/img/logos/bannerTrama.png" />
					</a>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10">
					<?php echo $this->fetch('content'); ?>
				</div>
				
				
				<div class="col-sm-2">
					
					<!-- Login -->
					<div class="row">
						<div class="col-sm-12">
							<?php if (AuthComponent::user('name') != ''): ?>
								<p class="text-center text-grisOscuro">
									<?php echo __('Bienvenido, ') . AuthComponent::user('name'); ?>
								</p>
								
								<ul class="list-group menu-sm">
									<li class="list-group-item">
										<a href="<?php echo $siteLink ?>" target="_blank"> 
											<i class="fa fa-home"></i> <?php echo $siteName ?>
										</a>
									</li>
									<li class="list-group-item">
										<a href="/"> 
											<i class="fa fa-film"></i> <?php echo __('Producciones'); ?>
										</a>
									</li>
									<li class="list-group-item">
										<a href="/usuarios/nuevo"> 
											<i class="fa fa-user"></i> <?php echo __('Nuevo Usuario'); ?>
										</a>
									</li>
									<li class="list-group-item">
										<a href="/usuarios/listado"> 
											<i class="fa fa-users"></i> <?php echo __('Listar Usuarios'); ?>
										</a>
									</li>
									<li class="list-group-item">
										<a href="/tracks/create"> 
											<i class="fa fa-cloud-upload"></i> <?php echo __('Nuevo Video'); ?>
										</a>
									</li>
									<li class="list-group-item">
										<a href="/tracks">
											<i class="fa fa-list"></i> <?php echo __('Listar Videos'); ?>
										</a>
									</li>
									<li class="list-group-item">
										<a href="/users/logout">
											<i class="fa fa-sign-out"></i> <?php echo __('Salir'); ?>
										</a>
									</li>
								</ul>
							<?php else: ?>
								<ul class="list-group menu-sm">
									<li class="list-group-item">
										<a href="<?php echo $siteLink ?>" target="_blank"> 
											<i class="fa fa-home"></i> <?php echo $siteName ?>
										</a>
									</li>
									<li class="list-group-item">
										<a href="/"> 
											<i class="fa fa-film"></i> <?php echo __('Producciones'); ?>
										</a>
									</li>
									<li class="list-group-item">
										<a href="/users/login"> 
											<i class="fa fa-user"></i> <?php echo __('Ingresar'); ?>
										</a>
									</li>
								</ul>
							<?php endif; ?>
						</div>
					</div>
					
					<hr class="grisOscuro" />
					
					<!-- Buscar -->
					<div class="row">
						<div class="col-sm-12">
							<form action="/tracks/search" method="get" role="search">
								<div class="form-group">
									<input type="text" name="q" class="form-control" placeholder="<?php echo __('Buscar'); ?>">
								</div>
								<span class="">Buscar por:</span>
								<ul class="list-undecorated">
									<li>
										<div class="form-group">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="d" value="1"> Descripción
												</label>
											</div>
										</div>
									</li>
									<li>
										<div class="form-group">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="l" value="1"> Localidad
												</label>
											</div>
										</div>
									</li>
									<li>
										<div class="input-group">
											<input class="form-control col-sm-8" type="text" name="v" 
												value="{{visit}}" 
												data-ng-model="visit" 
												data-date-format="dd-mm-yyyy"
												placeholder="Día de Visita" 
												bs-datepicker />
											<span class="input-group-addon" data-toggle="datepicker">
												<i class="fa fa-calendar"></i>
											</span>
										</div>
									</li>
								</ul>
								<div class="row text-center">
									<button type="submit" class="btn btn-default">
										<?php echo __('Buscar'); ?>
									</button>
									
								</div>
							</form>
							
						</div>
					</div>
					
				</div>
			</div>


		</div>

		<!-- footer -->
		<footer class="navbar-inverse">

		</footer>

		<?php echo $this->element('sql_dump'); ?>

		<?php
		echo $this->Html->script(array(
			'//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'
			, 'vendor/bootstrap.min'
			, '//ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js'
			, 'vendor/angular-strap.min'
			, 'vendor/bootstrap-datepicker'
			, 'angular/controllers'
		));
		echo $this->fetch('script');
		?>
		<script>
			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] ||
				function() {
					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o), m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)
			})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

			ga('create', 'UA-27799433-9', 'distribucionfederal.com.ar');
			ga('send', 'pageview');

		</script>
	</body>
</html>
