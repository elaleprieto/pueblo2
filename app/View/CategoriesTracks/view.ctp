<div class="categoriesTracks view">
<h2><?php echo __('Categories Track'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoriesTrack['CategoriesTrack']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($categoriesTrack['CategoriesTrack']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($categoriesTrack['CategoriesTrack']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesTrack['Category']['title'], array('controller' => 'categories', 'action' => 'view', $categoriesTrack['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Track'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesTrack['Track']['title'], array('controller' => 'tracks', 'action' => 'view', $categoriesTrack['Track']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories Track'), array('action' => 'edit', $categoriesTrack['CategoriesTrack']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categories Track'), array('action' => 'delete', $categoriesTrack['CategoriesTrack']['id']), null, __('Are you sure you want to delete # %s?', $categoriesTrack['CategoriesTrack']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Tracks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories Track'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tracks'), array('controller' => 'tracks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Track'), array('controller' => 'tracks', 'action' => 'add')); ?> </li>
	</ul>
</div>
