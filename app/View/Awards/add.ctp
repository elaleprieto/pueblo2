<div class="awards form">
<?php echo $this->Form->create('Award'); ?>
	<fieldset>
		<legend><?php echo __('Add Award'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('titulo');
		echo $this->Form->input('description');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('track_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Awards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
	</ul>
</div>
