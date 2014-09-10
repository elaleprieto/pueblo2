<?php
echo $this->Html->css(array('vendor/bootstrap.min', 'tracks/iframe', 'http://fonts.googleapis.com/css?family=Rokkitt:400,700'), null, array('inline' => true));
$cantidad = 9;
$tracks = $this->requestAction(Router::url(array('controller' => 'tracks', 'action' => 'iframe', $cantidad)));
// debug($tracks);
?>

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
							?>
						</div>
						<h3>
							<a href="/tracks/view/<?php echo $tracks[$i]['Track']['id']?>">
								<?php echo $tracks[$i]['Track']['title'] ?>
							</a>
						</h3>
						<p><?php echo ucfirst($tracks[$i]['Track']['description']) ?></p>
				 	</div>
			<?php if (($i + 1) % 3 == 0 || $i == sizeof($tracks) - 1): ?>
				</div>
			<?php endif; ?>
		<?php endfor; ?>
		
	</div>
</div>

