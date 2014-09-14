<?php
echo $this->Html->css(array('tracks/add'));

$cd = $this->data['Track']['category'];

if($this->data['Track']['visit'] != '0000-00-00')
	$visit = $this->Time->format($this->data['Track']['visit'], '%d-%m-%Y');
else
	$visit = date('d-m-Y');
?>

<div id="inicio" data-ng-controller="TracksController">
	<div class="row">
		<div class="col-sm-12">
			<span class="alert alert-{{mensaje.tag}} pull-left" ng-show='mensaje.text' ng-bind="mensaje.text" ng-class=""></span>
		</div>
	</div>
	
	<h2><?php echo __('Editar'); ?></h2>
	<hr />
	<div class="row datos">
		<div class="col-sm-12">
			<?php echo $this->Form->create('Track', array('id' => 'formulario'
				, 'name' => 'formulario'
				, 'data-ng-submit' => 'submit($event)'
				, 'type' => 'file'
				)
			);
			?>
			<div class="row">
				<div class="col-sm-12 text-center">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-primary<?= $cd=='1' ? ' active' : '' ?>">
							<input type="radio" name="data[Track][category]" value="1" id="TrackCategory1" <?= $cd=='1' ? 'checked' : '' ?>> Taller de Televisión
						</label>
						<label class="btn btn-primary<?= $cd=='2' ? ' active' : '' ?>">
							<input type="radio" name="data[Track][category]" value="2" id="TrackCategory2" <?= $cd=='2' ? 'checked' : '' ?>> Taller de Gráfica
						</label>
						<label class="btn btn-primary<?= $cd=='5' ? ' active' : '' ?>">
							<input type="radio" name="data[Track][category]" value="5" id="TrackCategory5" <?= $cd=='5' ? 'checked' : '' ?>> Taller de Radio
						</label>
						<label class="btn btn-primary<?= $cd=='9' ? ' active' : '' ?>">
							<input type="radio" name="data[Track][category]" value="9" id="TrackCategory9" <?= $cd=='9' ? 'checked' : '' ?>> Taller de Software Libre
						</label>
					</div>
				</div>
			</div>
			<div class="row">
				<?php
				echo $this->Form->input('id');
				echo $this->Form->input('title', array(
					'autocomplete' => false,
					'class' => 'col-sm-12 form-control',
					'div' => 'col-sm-4',
					'label' => false,
					'placeholder' => 'Titulo',
					'required' => 'required',
					'type' => 'text'
				));
				echo $this->Form->input('description', array(
					'autocomplete' => false,
					'class' => 'col-sm-12 form-control',
					'div' => 'col-sm-4',
					'label' => false,
					'placeholder' => 'Descripción',
					'type' => 'text'
				));
				echo $this->Form->input('localidad', array(
					'autocomplete' => false,
					'class' => 'col-sm-12 form-control',
					'div' => 'col-sm-4',
					'label' => false,
					'placeholder' => 'Localidad',
					'type' => 'text'
				));
				?>
			</div>
			<div class="row">
				<!-- Datepicker -->
				<div class="input-group col-sm-4">
					<input class="form-control col-sm-8" type="text" name="data[Track][visit]" 
						value="{{visit}}" 
						data-ng-model="visit" 
						data-date-format="dd-mm-yyyy" 
						data-ng-init="visit='<?php echo $visit ?>'" 
						bs-datepicker />
					<span class="input-group-addon" data-toggle="datepicker"><i class="fa fa-calendar"></i></span>
				</div>
				
				<!-- EntryID -->
				<div class="col-sm-4">
					<div class="row">
						<?php
						echo $this->Form->input('entryId', array(
							'autocomplete' => false,
							'class' => 'col-sm-12 form-control hidden',
							'ng-model' => 'entryId',
							'div' => 'col-sm-12',
							'label' => false,
							'placeholder' => 'Video ID',
							// 'required' => 'required',
							'data-ng-init' => 'entryId="' . $this->data['Track']['entryId'] . '"'
						));
						?>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="row">
						<?php
						echo $this->Form->input('destacado', array('div' => 'col-sm-12', 'hiddenField' => false));
						?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-2">
					Imagen de portada: 
				</div>
				<div class="col-sm-10">
					<?php echo $this->Form->file('image', array('data-file'=>"param.file", 'div' => 'false', 'label'=>false)); ?>
				</div>
			</div>
			<div class="row text-center">
				<div id="kcw"></div>
			</div>
			<div class="row">
				<p class="text-center">
					No cierre esta ventana y espere hasta que termine de subir el video.
					Haga clic en "Next" dos veces y luego podrá guardar la ficha.
					Si desea cargar otro video, haga clic <a href="/tracks/create" target="_blank">aquí</a>.
				</p>
				<button class="btn col-sm-2 col-sm-offset-5" type="submit">
					<?php echo __('Guardar'); ?>
				</button>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript">
	var params = {
		allowScriptAccess : "always",
		allowNetworking : "all",
		wmode : "opaque"
	};
	// php to js
	var flashVars =
 <?php echo json_encode($flashVars); ?>;

	<!-- embed flash object -->
	// swfobject.embedSWF("http://www.kaltura.com/kcw/ui_conf_id/1000740", "kcw", "680", "360", "9.0.0", "expressInstall.swf", flashVars, params);
	// swfobject.embedSWF("http://www.librekaltura.com.ar/kcw/ui_conf_id/11170222", "kcw", "680", "360", "9.0.0", "expressInstall.swf", flashVars, params);
	// swfobject.embedSWF("http://www.librekaltura.com.ar/kcw/ui_conf_id/11170253", "kcw", "680", "360", "9.0.0", "expressInstall.swf", flashVars, params);
	swfobject.embedSWF("http://www.librekaltura.com.ar/kcw/ui_conf_id/11170265", "kcw", "680", "360", "9.0.0", "expressInstall.swf", flashVars, params);
	// swfobject.embedSWF("http://www.librekaltura.com.ar/kcw/ui_conf_id/2011401", "kcw", "680", "360", "9.0.0", "expressInstall.swf", flashVars, params);
</script>
 
<!--implement callback scripts-->
<script type="text/javascript">
	function onContributionWizardAfterAddEntry(entries) {
		// alert(entries.length + " media file/s was/were succsesfully uploaded");
		for (var i = 0; i < entries.length; i++) {
			// alert("entries["+i+"]:EntryID = " + entries[i].entryId);
			$('#TrackEntryId').val(entries[i].entryId);
			$('#TrackEntryId').trigger('input');
			$('#kcw').hide();
		}
	}
</script>
<script type="text/javascript">
	function onContributionWizardClose() {
		$('#kcw').hide();
		// alert("Thank you for using Kaltura ontribution Wizard");
	}
</script>































