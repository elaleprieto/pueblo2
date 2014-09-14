<?php //debug($track) ?>

<div class="row">
	<div class="col-sm-12">

		<div class="row">
			<div class="col-sm-12">
				<h3><?php echo $track['Track']['title'] ?></h3>
			</div>
		</div>
		<br />

		<!-- Track -->
		<div class="row">
			<div class="col-sm-12">
				<?php 
				# Si tiene entryId posiblemente sea video o audio. Si no tiene entryId posiblemente sea una imagen sola.
				if ($track['Track']['entryId']):
					App::uses('KalturaComponent', 'Controller');
					if($type == KalturaComponent::VIDEO):
						echo $kUrlEmbed ? $kUrlEmbed : '&nbsp;';
					elseif($type == KalturaComponent::AUDIO):
						if(isset($track['Track']['image'])):
					?>
							<div class="row">
								<div class="col-sm-12 text-center">
									<?php echo $this->Html->image('tracks/images/'.$track['Track']['image'], array('class'=>'img-responsive')) ?>
								</div>
							</div>
						<?php endif; ?>
						<div class="row">
							<div class="col-sm-12">
								<?php echo $kUrlEmbed ? $kUrlEmbed : '&nbsp;'; ?>
							</div>
						</div>
					<?php
					endif;
				elseif(isset($track['Track']['image'])):
				?>
					<div class="text-center">
						<?php echo $this->Html->image('tracks/images/'.$track['Track']['image'], array('class'=>'img-responsive')) ?>
					</div>
				<?php
				endif;
				?>
			</div>
		</div>

		<!-- Información del track -->
		<div class="row">
			<div class="col-sm-12">
				<dl class="dl-horizontal">
					<dt>Descripción</dt>
					<dd><?php echo $track['Track']['description'] ?></dd>
					<dt>Localidad</dt>
					<dd><?php echo $track['Track']['localidad'] ?></dd>
					<dt>Fecha de la visita</dt>
					<dd><?php echo $track['Track']['visit'] != '0000-00-00' ? $this->Time->format($track['Track']['visit'], '%d-%m-%Y') : '-' ?></dd>
				</dl>
			</div>
		</div>
	</div>
</div>
