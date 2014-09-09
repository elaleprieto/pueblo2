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
							<th>Descripción</th>
							<th>Localidad</th>
							<th>Fecha</th>
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
										<?php echo $track['Track']['description']; ?>
									</td>
									<td>
										<?php echo $track['Track']['localidad']; ?>
									</td>
									<td>
										<?php echo $track['Track']['visit'] != '0000-00-00' ? $this->Time->format($track['Track']['visit'], '%d-%m-%Y') : '-'; ?>
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