<div class="users index">
	<h2><?php echo __('Usuarios'); ?></h2>
	<table cellpadding="0" cellspacing="0" class="table table-hover">
		<tr>
				<th><?php echo $this->Paginator->sort('username', 'Usuario'); ?></th>
				<th><?php echo $this->Paginator->sort('rol_id'); ?></th>
				<th class="actions"><?php echo __('Acciones'); ?></th>
		</tr>
		<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
			<td><?php echo h($user['Rol']['title']); ?>&nbsp;</td>
			<td class="actions col-sm-3">
				<?php 
				echo $this->Html->link(__('Editar')
					, Router::url('/usuarios/editar/' . $user['User']['id'])
					, array('class'=>'btn btn-primary')
				);
				?>
				<?php 
				echo $this->Form->postLink(__('Eliminar')
					, array('action' => 'delete', $user['User']['id'])
					, array('class'=>'btn btn-primary')
					, __('¿Estás seguro que quieres eliminar "%s"?', $user['User']['username'])
				);
				?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	
	<div class="row">
		<div class="col-sm-12 text-center">
			<p>
				<?php
				echo $this->Paginator->counter(array('format' => __('Página {:page} de {:pages}')));
				?>	
			</p>
			<div class="paging">
				<?php
				echo $this->Paginator->prev('< ' . __('anterior '), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ' | '));
				echo $this->Paginator->next(__(' siguiente') . ' >', array(), null, array('class' => 'next disabled'));
				?>
			</div>
		</div>
	</div>
</div>
<!-- <div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
	</ul>
</div> -->
