<div class="quapitulos view">
<h2><?php echo __('Quapitulo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($quapitulo['Quapitulo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($quapitulo['Quapitulo']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quapitulo['Quapitulo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($quapitulo['Quapitulo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Quapitulo'), array('action' => 'edit', $quapitulo['Quapitulo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Quapitulo'), array('action' => 'delete', $quapitulo['Quapitulo']['id']), null, __('Are you sure you want to delete # %s?', $quapitulo['Quapitulo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Quapitulos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Quapitulo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
