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

$cakeDescription = __d('cake_dev', 'Trama Audiovisual');
?>
<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title> <?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?> </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array(
			'vendor/bootstrap.min',
			'layouts/default'
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
	<body>
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
										<a href="http://www.tramaaudiovisual.com.ar" target="_blank"> 
											<i class="fa fa-home"></i> <?php echo __('Trama Audiovisual'); ?>
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
										<a href="http://www.tramaaudiovisual.com.ar" target="_blank"> 
											<i class="fa fa-home"></i> <?php echo __('Trama Audiovisual'); ?>
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
								<span class="text-grisOscuro">Buscar por:</span>
								<ul class="list-undecorated">
									<li>
										<div class="form-group">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="c" value="1"> Categorías
												</label>
											</div>
										</div>
									</li>
									<li>
										<div class="form-group">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="t" value="1"> Etiquetas
												</label>
											</div>
										</div>
									</li>
									<li>
										<div class="form-group">
											<div class="checkbox">
												<label>
													<input type="checkbox" name="u" value="1"> Usuarios
												</label>
											</div>
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

			<!-- Logos de auspiciantes -->
			<div class="row auspiciantes">
				<div class="col-sm-1 col-sm-offset-4 text-center">
					<?php
					echo $this->Html->link($this->Html->image('logos/usinademedios.png', array(
						'alt' => 'Usina de Medios',
						'border' => '0',
						'class' => 'img-responsive'
					)), 'http://www.usinademedios.org.ar/', array(
						'escape' => false,
						'target' => '_blank'
					));
					?>
				</div>
				<!-- Descomentar si se quiere el logo de TDA de vuelta -->
				<!-- ojo con el col-sm-2 que también se comenta -->
				<!--
				<div class="col-sm-2 text-center">
				<?php
				// echo  $this->Html->image('logos/Ausp-TDA-120.png'
				//	, array('alt' => 'tda', 'border' => '0'));
				?>
				</div>
				<div class="col-sm-2 text-center">
				-->
				<div class="col-sm-2 col-sm-offset-2 text-center">
					<?php
					echo $this->Html->link($this->Html->image('logos/geomedio.png', array(
						'alt' => 'GeoMedio',
						'border' => '0',
						'class' => 'img-responsive'
					)), 'http://www.geomedio.com.ar/', array(
						'escape' => false,
						'target' => '_blank'
					));
					?>
				</div>
			</div>
		</footer>

		<?php echo $this->element('sql_dump'); ?>

		<?php
		echo $this->Html->script(array(
			'//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
			'vendor/bootstrap.min'
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
