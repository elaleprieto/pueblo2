<?php //debug($track) ?>

<div class="row">
	<div class="col-sm-12">
		<!-- detalles del track -->
		<div class="row">
			<div class="col-sm-12">
				<h3><?php echo $track['Track']['title'] ?></h3>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-sm-12">
				<?php echo $kUrlEmbed ? $kUrlEmbed : '&nbsp;'; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<dl class="dl-horizontal">
					<dt>Descripción</dt>
					<dd><?php echo $track['Track']['description'] ?></dd>
					<dt>Localidad</dt>
					<dd><?php echo $track['Track']['localidad'] ?></dd>
					<dt>Fecha de la visita</dt>
					<dd><?php echo $track['Track']['visit'] != '0000-00-00' ? $track['Track']['visit'] : '-' ?></dd>
				</dl>
			</div>
		</div>
	</div>
</div>
