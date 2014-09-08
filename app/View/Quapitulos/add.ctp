<div class="quapitulos form">
<?php echo $this->Form->create('Quapitulo'); ?>
	<fieldset>
		<legend><?php echo __('Add Quapitulo'); ?></legend>
	<?php
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Quapitulos'), array('action' => 'index')); ?></li>
	</ul>
</div>
