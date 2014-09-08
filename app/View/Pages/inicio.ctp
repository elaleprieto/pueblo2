<?php
echo $this->Html->css(array('inicio', 'http://fonts.googleapis.com/css?family=Dosis'), null, array('inline' => false));
$cantidad = 3;
$excluidos = null;
// $ficcion = $this->requestAction('tracks/get/'.$cantidad);

$ficcion = $this->requestAction(Router::url(array('controller' => 'tracks', 'action' => 'get', $cantidad, 'ficcion')));
# (solución de compromiso) Se excluyen los tracks recién buscado para la búsqueda siguiente. 
foreach ($ficcion as $track)
	$excluidos .= '-'.$track['Track']['id'];

$ficcion2 = $this->requestAction(Router::url(array('controller' => 'tracks', 'action' => 'get', $cantidad, 'ficcion', $excluidos)));
# (solución de compromiso) Se excluyen los tracks recién buscado para la búsqueda siguiente. 
foreach ($ficcion2 as $track)
	$excluidos .= '-'.$track['Track']['id'];

$documental = $this->requestAction(Router::url(array('controller' => 'tracks', 'action' => 'get', $cantidad, 'documental', $excluidos)));
# (solución de compromiso) Se excluyen los tracks recién buscado para la búsqueda siguiente. 
foreach ($documental as $track)
	$excluidos .= '-'.$track['Track']['id'];

$documental2 = $this->requestAction(Router::url(array('controller' => 'tracks', 'action' => 'get', $cantidad, 'documental', $excluidos)));
?>

<!-- Videos selección aleatoria -->
<div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="row">
			<!-- Ficción -->
			<div class="col-sm-3">
				<div class="row text-center">
					<h5><a href="/ficcion"> [ ficción ] </a></h5>
				</div>
				<?php foreach ($ficcion as $track): ?>
					<a href="/tracks/view/<?php echo $track['Track']['id']?>">
						<div class="row text-center ">
							<div class="col-sm-11 col-sm-offset-1 videoRow">
								<div class="row text-center videoThumb">
									<div class="col-sm-12">
										<?php
										$date = date('Ymdhds');
										$url = 'http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['entryId'] . '/width/135/height/81'.$date;
										echo $this->Html->image($url, array('class' => 'col-sm-12 img-responsive'));
										// if ($track['Track']['portadaId']) :
											// // http://"YOURSERVER"/p/1/sp/100/thumbnail/entry_id/"ENTRYID"/width/"WIDTH"/height/"HEIGHT"
											// echo $this->Html->image('http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['portadaId'], array('class' => 'portada'));
										// else :
											// echo $this->Html->image('thumbs/noThumb.png', array('class' => 'portada'));
										// endif;
										?>
									</div>
								</div>
								<div class="row text-center">
									<div class="col-sm-12 videoText" >
										<span><?php echo $track['Track']['title'] ?></span>
									</div>
								</div>
							</div>
						</div>
					</a>
					<br />
				<?php endforeach; ?>
			</div>
			<!-- Ficción -->
			<div class="col-sm-3">
				<div class="row text-center">
					<h5><a href="/ficcion"> [ ficción ] </a></h5>
				</div>
				<?php foreach ($ficcion2 as $track): ?>
					<a href="/tracks/view/<?php echo $track['Track']['id']?>">
						<div class="row text-center ">
							<div class="col-sm-11 col-sm-offset-1 videoRow">
								<div class="row text-center videoThumb">
									<div class="col-sm-12">
										<?php
										$url = 'http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['entryId'] . '/width/135/height/81';
										echo $this->Html->image($url, array('class' => 'col-sm-12 img-responsive'));
										// if ($track['Track']['portadaId']) :
											// // http://"YOURSERVER"/p/1/sp/100/thumbnail/entry_id/"ENTRYID"/width/"WIDTH"/height/"HEIGHT"
											// echo $this->Html->image('http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['portadaId'], array('class' => 'portada'));
										// else :
											// echo $this->Html->image('thumbs/noThumb.png', array('class' => 'portada'));
										// endif;
										?>
									</div>
								</div>
								<div class="row text-center">
									<div class="col-sm-12 videoText" >
										<span><?php echo $track['Track']['title'] ?></span>
									</div>
								</div>
							</div>
						</div>
					</a>
					<br />
				<?php endforeach; ?>
			</div>
			<!-- Documental -->
			<div class="col-sm-3">
				<div class="row text-center">
					<h5><a href="/documental"> [ documental ] </a></h5>
				</div>
					<?php foreach ($documental as $track): ?>
					<a href="/tracks/view/<?php echo $track['Track']['id']?>">
						<div class="row text-center ">
							<div class="col-sm-11 col-sm-offset-1 videoRow">
								<div class="row text-center videoThumb">
									<div class="col-sm-12">
										<?php
										$url = 'http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['entryId'] . '/width/135/height/81';
										echo $this->Html->image($url, array('class' => 'col-sm-12 img-responsive'));
										// if ($track['Track']['portadaId']) :
											// // http://"YOURSERVER"/p/1/sp/100/thumbnail/entry_id/"ENTRYID"/width/"WIDTH"/height/"HEIGHT"
											// echo $this->Html->image('http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['portadaId'], array('class' => 'portada'));
										// else :
											// echo $this->Html->image('thumbs/noThumb.png', array('class' => 'portada'));
										// endif;
										?>
									</div>
								</div>
								<div class="row text-center">
									<div class="col-sm-12 videoText" >
										<span><?php echo $track['Track']['title'] ?></span>
									</div>
								</div>
							</div>
						</div>
					</a>
					<br />
				<?php endforeach; ?>
			</div>
			<!-- Documental -->
			<div class="col-sm-3">
				<div class="row text-center">
					<h5><a href="/documental"> [ documental ] </a></h5>
				</div>
					<?php foreach ($documental2 as $track): ?>
					<a href="/tracks/view/<?php echo $track['Track']['id']?>">
						<div class="row text-center ">
							<div class="col-sm-11 col-sm-offset-1 videoRow">
								<div class="row text-center videoThumb">
									<div class="col-sm-12">
										<?php
										$url = 'http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['entryId'] . '/width/135/height/81';
										echo $this->Html->image($url, array('class' => 'col-sm-12 img-responsive'));
										// if ($track['Track']['portadaId']) :
											// // http://"YOURSERVER"/p/1/sp/100/thumbnail/entry_id/"ENTRYID"/width/"WIDTH"/height/"HEIGHT"
											// echo $this->Html->image('http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['portadaId'], array('class' => 'portada'));
										// else :
											// echo $this->Html->image('thumbs/noThumb.png', array('class' => 'portada'));
										// endif;
										?>
									</div>
								</div>
								<div class="row text-center">
									<div class="col-sm-12 videoText" >
										<span><?php echo $track['Track']['title'] ?></span>
									</div>
								</div>
							</div>
						</div>
					</a>
					<br />
				<?php endforeach; ?>
			</div>
			<!-- <div class="col-sm-3">
				<div class="row text-center">
					<h5><a href="/animacion"> [ animación ] </a></h5>
				</div>
				<div class="row text-center">
					<div class="col-sm-11 col-sm-offset-1 videoRow">
						<div class="row text-center videoThumb">
							<div class="col-sm-12">
								<a href="/tracks/view/2"> <img class="portada" src="/img/thumbs/animacion1.jpg" /> </a>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-sm-12 videoText" >
								<span>SOLTEROS</span>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div class="row text-center">
					<div class="col-sm-11 col-sm-offset-1 videoRow">
						<div class="row text-center videoThumb">
							<div class="col-sm-12">
								<a href="/tracks/view/2"> <img class="portada" src="/img/thumbs/animacion2.jpg" /> </a>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-sm-12 videoText" >
								<span>EN FUGA</span>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div class="row text-center ">
					<div class="col-sm-11 col-sm-offset-1 videoRow">
						<div class="row text-center videoThumb">
							<div class="col-sm-12">
								<a href="/tracks/view/2"> <img class="portada" src="/img/thumbs/animacion3.jpg" /> </a>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-sm-12 videoText" >
								<span>NATURALEZA VIVA</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="row text-center">
					<h5><a href="/cortos"> [ cortometraje ] </a></h5>
				</div>
				<div class="row text-center">
					<div class="col-sm-11 col-sm-offset-1 videoRow">
						<div class="row text-center videoThumb">
							<div class="col-sm-12">
								<a href="/tracks/view/2"> <img class="portada" src="/img/thumbs/largometraje1.jpg" /> </a>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-sm-12 videoText" >
								<span>ADICTOS</span>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div class="row text-center">
					<div class="col-sm-11 col-sm-offset-1 videoRow">
						<div class="row text-center videoThumb">
							<div class="col-sm-12">
								<a href="/tracks/view/2"> <img class="portada" src="/img/thumbs/largometraje2.jpg" /> </a>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-sm-12 videoText" >
								<span>EMITERIO</span>
							</div>
						</div>
					</div>
				</div>
				<br />
				<div class="row text-center">
					<div class="col-sm-11 col-sm-offset-1 videoRow">
						<div class="row text-center videoThumb">
							<div class="col-sm-12">
								<a href="/tracks/view/2"> <img class="portada" src="/img/thumbs/largometraje3.jpg" /> </a>
							</div>
						</div>
						<div class="row text-center">
							<div class="col-sm-12 videoText" >
								<span>PAISANOS</span>
							</div>
						</div>
					</div>
				</div> -->
			<!-- </div> -->
		</div>
	</div>
</div><!-- /videos selección aleatoria -->
<br />

