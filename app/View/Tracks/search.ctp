<?php
if(isset($this->request->data['query'])):
?>
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-sm-12 text-center">
					<h4 class="category">
						Búsqueda: <?php echo $this->request->data['query']; ?>
					</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 videos">
					<table class="table">
						<thead>
							<th>Título</th>
							<th>Duración</th>
							<th>Formato</th>
							<th>Categoría</th>
							<th>Etiquetas</th>
							<th>Medio</th>
							<th>Acciones</th>
						</thead>
						<tbody>
							<?php foreach ($tracks as $track): ?>
								<tr>
									<td>
										<a href="/tracks/view/<?php echo $track['Track']['id']; ?>">
											<h5><?php echo $track['Track']['title']; ?></h5>
										</a>
									</td>
									<td>
										<?php echo $track['Track']['duracion']; ?>
									</td>
									<td>
										<?php echo $track['Track']['formato']; ?>
									</td>
									<td>
										<?php
										foreach ($track['Category'] as $category) :
											echo $category['title'];
										endforeach;
										?>
									</td>
									<td>
										<?php foreach ($track['Tag'] as $tag): ?>
											<a href="/buscar/<?php echo $tag['title']; ?>?t=1">
												<?php echo $tag['title'] . ' '; ?>
											</a>
										<?php endforeach; ?>
									</td>
									<td>
										<?php echo $track['User']['name']; ?>
									</td>
									<td>
										<a href="/tracks/view/<?php echo $track['Track']['id']; ?>" class="btn btn-default">
											<i class="fa fa-eye"></i> Ver
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="row">
		<div class="col-sm-12 text-center">
			<h3>La búsqueda no arrojó ningún resultado :(</h3>
		</div>
	</div>
<?php endif; ?>

<?php //debug($tracks); ?>