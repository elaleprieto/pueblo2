<?php
if(!isset($cantidad)) $cantidad = 9;
if(!isset($category)) $category = null;

$tracks = $this->requestAction(Router::url(array('controller' => 'tracks', 'action' => 'iframe', $cantidad, $category)));
$categoryTitle = $this->requestAction(Router::url(array('controller' => 'categories', 'action' => 'get', $category)));
?>

<?php if(sizeof($tracks)): ?>
	<?php if(isset($full) && ($full == 1)): ?>
		<div class="row">
			<div class="col-sm-12 text-center">
				<h1 class="iframe"><?php echo $categoryTitle ?></h1>
			</div>
		</div>
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
									switch ($category) {
										case '1':
											$url = 'http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $tracks[$i]['Track']['entryId'] . '/width/135/height/81'.$date;
											break;

										default:
											if($tracks[$i]['Track']['image'])
												$url = 'tracks/images/' . $tracks[$i]['Track']['image'];
											else
												$url = 'tracks/images/default.jpg';
											break;
									}

									echo $this->Html->link($this->Html->image($url, array('class' => 'col-sm-12 img-responsive'))
										, array('controller'=>'tracks', 'action'=>'view', $tracks[$i]['Track']['id'])
										, array('escape'=>false));
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
	<?php else: ?>
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
									switch ($category) {
										case '1':
											$url = 'http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $tracks[$i]['Track']['entryId'] . '/width/135/height/81'.$date;
											break;

										default:
											if($tracks[$i]['Track']['image'])
												$url = 'tracks/images/' . $tracks[$i]['Track']['image'];
											else
												$url = 'tracks/images/default.jpg';
											break;
									}

									echo $this->Html->link($this->Html->image($url, array('class' => 'col-sm-12 img-responsive'))
										, array('controller'=>'tracks', 'action'=>'view', $tracks[$i]['Track']['id'])
										, array('escape'=>false));
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
	<?php endif; ?>
<?php endif; ?>
