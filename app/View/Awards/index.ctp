<div class="awards index">
	<h2><?php echo __('Awards'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('titulo'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('track_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($awards as $award): ?>
	<tr>
		<td><?php echo h($award['Award']['id']); ?>&nbsp;</td>
		<td><?php echo h($award['Award']['title']); ?>&nbsp;</td>
		<td><?php echo h($award['Award']['titulo']); ?>&nbsp;</td>
		<td><?php echo h($award['Award']['description']); ?>&nbsp;</td>
		<td><?php echo h($award['Award']['descripcion']); ?>&nbsp;</td>
		<td><?php echo h($award['Award']['created']); ?>&nbsp;</td>
		<td><?php echo h($award['Award']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($award['Track']['title'], array('controller' => 'tracks', 'action' => 'view', $award['Track']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $award['Award']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $award['Award']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $award['Award']['id']), null, __('Are you sure you want to delete # %s?', $award['Award']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Award'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
	</ul>
</div>
