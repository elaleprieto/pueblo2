<div class="tagsTracks view">
<h2><?php echo __('Tags Track'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tagsTrack['TagsTrack']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tagsTrack['TagsTrack']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tagsTrack['TagsTrack']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tag'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tagsTrack['Tag']['title'], array('controller' => 'tags', 'action' => 'view', $tagsTrack['Tag']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Track'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tagsTrack['Track']['title'], array('controller' => 'tracks', 'action' => 'view', $tagsTrack['Track']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tags Track'), array('action' => 'edit', $tagsTrack['TagsTrack']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tags Track'), array('action' => 'delete', $tagsTrack['TagsTrack']['id']), null, __('Are you sure you want to delete # %s?', $tagsTrack['TagsTrack']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags Tracks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tags Track'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
	</ul>
</div>
