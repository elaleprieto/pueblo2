<?php echo $this->Html->css(array('tracks/add')); ?>

<div id="inicio" data-ng-app="App" data-ng-controller="TracksController">
	<div class="row">
		<div class="col-sm-12">
			<span class="alert alert-{{mensaje.tag}} pull-left" ng-show='mensaje.text' ng-bind="mensaje.text" ng-class=""></span>
		</div>
	</div>
	
	<h2><?php echo __('Cargador'); ?></h2>
	<hr />
	<div class="row datos">
		<div class="col-sm-12">
			<?php
			echo $this->Form->create('Track', array('id' => 'formulario'
				, 'name' => 'formulario'
				, 'data-ng-submit' => 'submit($event)'
				, 'type' => 'file'
				)
			);
			?>
			
			<div class="row">
				<?php
				echo $this->Form->input('title', array(
					'autocomplete' => false,
					'class' => 'col-sm-12 form-control',
					'div' => 'col-sm-4',
					'label' => false,
					'placeholder' => 'Título',
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
				<div class="input-group col-sm-4">
					<input class="form-control col-sm-8" type="text" name="data[Track][visit]" 
						value="{{visit}}" 
						data-ng-model="visit" 
						data-date-format="dd-mm-yyyy" 
						data-ng-init="visit='<?php echo date('d-m-Y') ?>'"
						bs-datepicker />
					<span class="input-group-addon" data-toggle="datepicker"><i class="fa fa-calendar"></i></span>
				</div>
				<div class="col-sm-4">
					<div class="row">
						<?php
						echo $this->Form->input('entryId', array(
							'autocomplete' => false,
							'class' => 'col-sm-12 form-control hidden',
							'div' => 'col-sm-12',
							'label' => false,
							'placeholder' => 'Video ID',
							// 'required' => 'required',
							'data-ng-model' => 'entryId'
						));
						?>
					</div>
				</div>
				<div class="col-sm-4">
					<?php
					echo $this->Form->input('destacado', array('div' => false, 'hiddenField' => false));
					?>
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
				<button class="btn col-sm-2 col-sm-offset-5" type="submit" data-ng-disabled="!entryId && !file">
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
	swfobject.embedSWF("http://www.librekaltura.com.ar/kcw/ui_conf_id/11170290", "kcw", "680", "360", "9.0.0", "expressInstall.swf", flashVars, params);
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
	}
</script>