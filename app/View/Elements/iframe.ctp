<?php
echo $this->Html->css(array('vendor/bootstrap.min', 'tracks/iframe', 'http://fonts.googleapis.com/css?family=Dosis'), null, array('inline' => true));
$cantidad = 9;
$tracks = $this->requestAction(Router::url(array('controller' => 'tracks', 'action' => 'iframe', $cantidad)));
// debug($tracks);
?>

<!-- Videos selección aleatoria -->
<!-- <div class="row">
	<div class="col-sm-10 col-sm-offset-1">
		<div class="row">
			<div class="col-sm-3">
				<?php foreach ($tracks as $track): ?>
					<a href="/tracks/view/<?php echo $track['Track']['id']?>">
						<div class="row text-center">
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
										<h3><?php echo $track['Track']['title'] ?></h3>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 videoText">
										<p><?php echo $track['Track']['sinopsis'] ?></p>
									</div>
								</div>
							</div>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div><!-- /videos selección aleatoria -->
<div class="row">
	<div class="col-sm-12 text-center">
		<?php for ($i = 0; $i < sizeof($tracks); $i++): ?> 
			<?php if ($i % 3 == 0): ?>
				<div class="row">
			<?php endif; ?>
					<div class="col-video">
							<div class="row text-center">
									<?php
									$date = date('Ymdhds');
									$url = 'http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $tracks[$i]['Track']['entryId'] . '/width/135/height/81'.$date;
									echo $this->Html->image($url, array('class' => 'col-sm-12 img-responsive'));
									// if ($track['Track']['portadaId']) :
										// // http://"YOURSERVER"/p/1/sp/100/thumbnail/entry_id/"ENTRYID"/width/"WIDTH"/height/"HEIGHT"
										// echo $this->Html->image('http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['portadaId'], array('class' => 'portada'));
									// else :
										// echo $this->Html->image('thumbs/noThumb.png', array('class' => 'portada'));
									// endif;
									?>
							</div>
							<h3>
								<a href="/tracks/view/<?php echo $track['Track']['id']?>">
									<?php echo $tracks[$i]['Track']['title'] ?>
								</a>
							</h3>
							<p><?php echo $tracks[$i]['Track']['description'] ?></p>
				 	</div>
			<?php if (($i + 1) % 3 == 0 || $i == sizeof($tracks) - 1): ?>
				</div> <!-- /row -->
			<?php endif; ?>
		<?php endfor; ?>
		
	</div>
</div>

