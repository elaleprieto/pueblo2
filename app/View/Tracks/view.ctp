<?php //debug($track) ?>

<div class="row">
	<div class="col-sm-12">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 text-right">
				<h4 class="category"> [ <?php echo strtolower($track['Category'][0]['title']); ?> ] </h4>
			</div>
		</div>

		<!-- detalles del track -->
		<div class="row">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">
						<!-- <img class="img-responsive" src="/img/thumbs/afiche.png" /> -->
						<?php
						if ($track['Track']['portadaId']) :
							// http://"YOURSERVER"/p/1/sp/100/thumbnail/entry_id/"ENTRYID"/width/"WIDTH"/height/"HEIGHT"
							$url = 'http://librekaltura.com.ar/p/1/sp/100/thumbnail/entry_id/' . $track['Track']['portadaId'] . '/width/165';
							echo $this->Html->image($url, array('class' => 'col-sm-12 img-responsive'));
						else :
							echo $this->Html->image('thumbs/noThumb.png', array('class' => 'col-sm-12 img-responsive'));
						endif;
						?>
					</div>
					<div class="col-sm-9">
						<div class="row">
							<h3> <?php echo $track['Track']['title'] ?>
							</h3>
						</div>
						<div class="row">
							<strong>Formato:</strong> <?php echo $track['Track']['formato'] ?>
						</div>
						<div class="row">
							<strong>Duración:</strong> <?php echo $track['Track']['duracion'] ?>
						</div>
						<div class="row">
							<strong>Guión:</strong> <?php echo $track['Track']['guion'] ?>
						</div>
						<div class="row">
							<strong>Dirección:</strong> <?php echo $track['Track']['director'] ?>
						</div>
						<div class="row">
							<strong>Producción:</strong> <?php echo $track['Track']['productor'] ?>
						</div>
						<div class="row">
							<strong>Contacto:</strong> <?php echo $track['Track']['contacto'] ?>
						</div>
						<div class="row">
							<strong>Mail:</strong> <?php echo $track['Track']['mail_distribuidora'] ?>
						</div>
						<div class="row">
							<strong>Teléfono:</strong> <?php echo $track['Track']['telefono'] ?>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<?php echo $kUrlEmbed ? $kUrlEmbed : '&nbsp;'; ?>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-10">
				<ul class="nav nav-tabs" id="myTab">
					<li class="active">
						<a href="#sinopsis" data-toggle="tab">SINOPSIS</a>
					</li>
					
					<?php if($track['Track']['sinopsis_en']): ?>
					<li>
						<a href="#synopsis" data-toggle="tab">SYNOPSIS</a>
					</li>
					<?php endif; ?>

					<?php if($track['Track']['sinopsis_po']): ?>
					<li>
						<a href="#sinopse" data-toggle="tab">SINOPSE</a>
					</li>
					<?php endif; ?>
				</ul>

				<div class="tab-content">
					<div class="tab-pane active" id="sinopsis">
						<?php echo $track['Track']['sinopsis_es'] ?>
					</div>

					<?php if($track['Track']['sinopsis_en']): ?>
					<div class="tab-pane" id="synopsis">
						<?php echo $track['Track']['sinopsis_en'] ?>
					</div>
					<?php endif; ?>

					<?php if($track['Track']['sinopsis_po']): ?>
					<div class="tab-pane" id="sinopse">
						<?php echo $track['Track']['sinopsis_po'] ?>
					</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <div class="tracks view">
<h2><?php echo __('Track'); ?></h2>
<dl>
<dt><?php echo __('Id'); ?></dt>
<dd>
<?php echo h($track['Track']['id']); ?>
&nbsp;
</dd>
<dt><?php echo __('CatalogoId'); ?></dt>
<dd>
<?php echo h($track['Track']['catalogoId']); ?>
&nbsp;
</dd>
<dt><?php echo __('Title'); ?></dt>
<dd>
<?php echo h($track['Track']['title']); ?>
&nbsp;
</dd>
<dt><?php echo __('Titulo'); ?></dt>
<dd>
<?php echo h($track['Track']['titulo']); ?>
&nbsp;
</dd>
<dt><?php echo __('Formato'); ?></dt>
<dd>
<?php echo h($track['Track']['formato']); ?>
&nbsp;
</dd>
<dt><?php echo __('Presentacion'); ?></dt>
<dd>
<?php echo h($track['Track']['presentacion']); ?>
&nbsp;
</dd>
<dt><?php echo __('Capitulos'); ?></dt>
<dd>
<?php echo h($track['Track']['capitulos']); ?>
&nbsp;
</dd>
<dt><?php echo __('Duracion'); ?></dt>
<dd>
<?php echo h($track['Track']['duracion']); ?>
&nbsp;
</dd>
<dt><?php echo __('Elenco'); ?></dt>
<dd>
<?php echo h($track['Track']['elenco']); ?>
&nbsp;
</dd>
<dt><?php echo __('Conduccion'); ?></dt>
<dd>
<?php echo h($track['Track']['conduccion']); ?>
&nbsp;
</dd>
<dt><?php echo __('Entrevistados'); ?></dt>
<dd>
<?php echo h($track['Track']['entrevistados']); ?>
&nbsp;
</dd>
<dt><?php echo __('Autor'); ?></dt>
<dd>
<?php echo h($track['Track']['autor']); ?>
&nbsp;
</dd>
<dt><?php echo __('Guion'); ?></dt>
<dd>
<?php echo h($track['Track']['guion']); ?>
&nbsp;
</dd>
<dt><?php echo __('Director'); ?></dt>
<dd>
<?php echo h($track['Track']['director']); ?>
&nbsp;
</dd>
<dt><?php echo __('Productor'); ?></dt>
<dd>
<?php echo h($track['Track']['productor']); ?>
&nbsp;
</dd>
<dt><?php echo __('Produccion Ejecutiva'); ?></dt>
<dd>
<?php echo h($track['Track']['produccion_ejecutiva']); ?>
&nbsp;
</dd>
<dt><?php echo __('Produccion General'); ?></dt>
<dd>
<?php echo h($track['Track']['produccion_general']); ?>
&nbsp;
</dd>
<dt><?php echo __('Mail'); ?></dt>
<dd>
<?php echo h($track['Track']['mail']); ?>
&nbsp;
</dd>
<dt><?php echo __('Distribuidor'); ?></dt>
<dd>
<?php echo h($track['Track']['distribuidor']); ?>
&nbsp;
</dd>
<dt><?php echo __('Contacto'); ?></dt>
<dd>
<?php echo h($track['Track']['contacto']); ?>
&nbsp;
</dd>
<dt><?php echo __('Mail Distribuidora'); ?></dt>
<dd>
<?php echo h($track['Track']['mail_distribuidora']); ?>
&nbsp;
</dd>
<dt><?php echo __('Website'); ?></dt>
<dd>
<?php echo h($track['Track']['website']); ?>
&nbsp;
</dd>
<dt><?php echo __('Telefono'); ?></dt>
<dd>
<?php echo h($track['Track']['telefono']); ?>
&nbsp;
</dd>
<dt><?php echo __('Sinopsis Es'); ?></dt>
<dd>
<?php echo h($track['Track']['sinopsis_es']); ?>
&nbsp;
</dd>
<dt><?php echo __('Sinopsis En'); ?></dt>
<dd>
<?php echo h($track['Track']['sinopsis_en']); ?>
&nbsp;
</dd>
<dt><?php echo __('Sinopsis Po'); ?></dt>
<dd>
<?php echo h($track['Track']['sinopsis_po']); ?>
&nbsp;
</dd>
<dt><?php echo __('Created'); ?></dt>
<dd>
<?php echo h($track['Track']['created']); ?>
&nbsp;
</dd>
<dt><?php echo __('Modified'); ?></dt>
<dd>
<?php echo h($track['Track']['modified']); ?>
&nbsp;
</dd>
<dt><?php echo __('Thumb'); ?></dt>
<dd>
<?php //echo h($track['Track']['entryId']); ?>
<?php
if(isset($thumbs) && sizeof($thumbs) > 0):
$thumb = $thumbs[0];
//try	{
//$thumb_url = $kClient->thumbAsset->serve($thumb->id);
//} catch(Exception $ex) {
// echo KajooHelper::getKalturaError(JText::_('Fail on geting thumb info'));
//}
?>
<li id="<?php echo $thumb->id;?>">
<a href="<?php echo $thumb_url;?>.jpg" class="fancybox-button" rel="fancybox-button" title="">
<img class="collectionthumbs" src="<?php echo $thumb_url;?>" />
</a>
</li>
<?php endif; ?>
&nbsp;
</dd>
<dt><?php echo __('EntryId'); ?></dt>
<dd>
<?php //echo h($track['Track']['entryId']); ?>
<?php echo $kUrlEmbed; ?>
&nbsp;
</dd>
</dl>
</div>
<div class="actions">
<h3><?php echo __('Actions'); ?></h3>
<ul>
<li><?php echo $this->Html->link(__('Edit Track'), array('action' => 'edit', $track['Track']['id'])); ?> </li>
<li><?php echo $this->Form->postLink(__('Delete Track'), array('action' => 'delete', $track['Track']['id']), null, __('Are you sure you want to delete # %s?', $track['Track']['id'])); ?> </li>
<li><?php echo $this->Html->link(__('List Tracks'), array('action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New Track'), array('action' => 'add')); ?> </li>
<li><?php echo $this->Html->link(__('List Awards'), array('controller' => 'awards', 'action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New Award'), array('controller' => 'awards', 'action' => 'add')); ?> </li>
<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
<li><?php echo $this->Html->link(__('List Tags'), array('controller' => 'tags', 'action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
</ul>
</div>
<div class="related">
<h3><?php echo __('Related Awards'); ?></h3>
<?php if (!empty($track['Award'])): ?>
<table cellpadding = "0" cellspacing = "0">
<tr>
<th><?php echo __('Id'); ?></th>
<th><?php echo __('Title'); ?></th>
<th><?php echo __('Titulo'); ?></th>
<th><?php echo __('Description'); ?></th>
<th><?php echo __('Descripcion'); ?></th>
<th><?php echo __('Created'); ?></th>
<th><?php echo __('Modified'); ?></th>
<th><?php echo __('Track Id'); ?></th>
<th class="actions"><?php echo __('Actions'); ?></th>
</tr>
<?php
$i = 0;
foreach ($track['Award'] as $award): ?>
<tr>
<td><?php echo $award['id']; ?></td>
<td><?php echo $award['title']; ?></td>
<td><?php echo $award['titulo']; ?></td>
<td><?php echo $award['description']; ?></td>
<td><?php echo $award['descripcion']; ?></td>
<td><?php echo $award['created']; ?></td>
<td><?php echo $award['modified']; ?></td>
<td><?php echo $award['track_id']; ?></td>
<td class="actions">
<?php echo $this->Html->link(__('View'), array('controller' => 'awards', 'action' => 'view', $award['id'])); ?>
<?php echo $this->Html->link(__('Edit'), array('controller' => 'awards', 'action' => 'edit', $award['id'])); ?>
<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'awards', 'action' => 'delete', $award['id']), null, __('Are you sure you want to delete # %s?', $award['id'])); ?>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<div class="actions">
<ul>
<li><?php echo $this->Html->link(__('New Award'), array('controller' => 'awards', 'action' => 'add')); ?> </li>
</ul>
</div>
</div>
<div class="related">
<h3><?php echo __('Related Categories'); ?></h3>
<?php if (!empty($track['Category'])): ?>
<table cellpadding = "0" cellspacing = "0">
<tr>
<th><?php echo __('Id'); ?></th>
<th><?php echo __('Title'); ?></th>
<th><?php echo __('Titulo'); ?></th>
<th><?php echo __('Description'); ?></th>
<th><?php echo __('Descripcion'); ?></th>
<th><?php echo __('Created'); ?></th>
<th><?php echo __('Modified'); ?></th>
<th class="actions"><?php echo __('Actions'); ?></th>
</tr>
<?php
$i = 0;
foreach ($track['Category'] as $category): ?>
<tr>
<td><?php echo $category['id']; ?></td>
<td><?php echo $category['title']; ?></td>
<td><?php echo $category['titulo']; ?></td>
<td><?php echo $category['description']; ?></td>
<td><?php echo $category['descripcion']; ?></td>
<td><?php echo $category['created']; ?></td>
<td><?php echo $category['modified']; ?></td>
<td class="actions">
<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, __('Are you sure you want to delete # %s?', $category['id'])); ?>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<div class="actions">
<ul>
<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
</ul>
</div>
</div>
<div class="related">
<h3><?php echo __('Related Tags'); ?></h3>
<?php if (!empty($track['Tag'])): ?>
<table cellpadding = "0" cellspacing = "0">
<tr>
<th><?php echo __('Id'); ?></th>
<th><?php echo __('Title'); ?></th>
<th><?php echo __('Titulo'); ?></th>
<th><?php echo __('Description'); ?></th>
<th><?php echo __('Descripcion'); ?></th>
<th><?php echo __('Created'); ?></th>
<th><?php echo __('Modified'); ?></th>
<th class="actions"><?php echo __('Actions'); ?></th>
</tr>
<?php
$i = 0;
foreach ($track['Tag'] as $tag): ?>
<tr>
<td><?php echo $tag['id']; ?></td>
<td><?php echo $tag['title']; ?></td>
<td><?php echo $tag['titulo']; ?></td>
<td><?php echo $tag['description']; ?></td>
<td><?php echo $tag['descripcion']; ?></td>
<td><?php echo $tag['created']; ?></td>
<td><?php echo $tag['modified']; ?></td>
<td class="actions">
<?php echo $this->Html->link(__('View'), array('controller' => 'tags', 'action' => 'view', $tag['id'])); ?>
<?php echo $this->Html->link(__('Edit'), array('controller' => 'tags', 'action' => 'edit', $tag['id'])); ?>
<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'tags', 'action' => 'delete', $tag['id']), null, __('Are you sure you want to delete # %s?', $tag['id'])); ?>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php endif; ?>

<div class="actions">
<ul>
<li><?php echo $this->Html->link(__('New Tag'), array('controller' => 'tags', 'action' => 'add')); ?> </li>
</ul>
</div>
</div> -->
