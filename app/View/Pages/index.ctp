<?php echo $this->Html->css('inicio', null, array('inline' => false)); ?>

<div class="row">
	<div class="col-sm-12 text-center">
		<?php echo $this->element('iframe', array('category'=>1, 'full'=>1)); ?>
		<?php echo $this->element('iframe', array('category'=>2, 'full'=>1)); ?>
		<?php echo $this->element('iframe', array('category'=>5, 'full'=>1)); ?>
		<?php echo $this->element('iframe', array('category'=>9, 'full'=>1)); ?>
	</div>
</div>
