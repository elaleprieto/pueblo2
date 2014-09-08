<div class="awards form">
<?php echo $this->Form->create('Award'); ?>
	<fieldset>
		<legend><?php echo __('Edit Award'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Award.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Award.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Awards'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
	</ul>
</div>
