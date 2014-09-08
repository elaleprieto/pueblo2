<?php //debug($track) ?>

<div class="row">
	<div class="col-sm-12">
		<!-- detalles del track -->
		<div class="row">
			<div class="col-sm-12">
				<h3><?php echo $track['Track']['title'] ?></h3>
				<dl class="dl-horizontal">
					<dt>Descripción</dt>
					<dd><?php echo $track['Track']['description'] ?></dd>
				</dl>
			</div>
		</div>
		<br />
		<div class="row">
			<div class="col-sm-12">
				<?php echo $kUrlEmbed ? $kUrlEmbed : '&nbsp;'; ?>
			</div>
		</div>
	</div>
</div>
