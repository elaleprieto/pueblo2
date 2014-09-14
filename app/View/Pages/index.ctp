<?php
echo $this->Html->css(array('inicio', 'http://fonts.googleapis.com/css?family=Dosis'), null, array('inline' => false));
?>


<div class="row">
	<div class="col-sm-12 text-center">
		<!-- <iframe width="420" height="315" src="//www.youtube.com/embed/Q0NVONS5o-E?rel=0" frameborder="0" allowfullscreen></iframe> -->
		<!-- <iframe width="100%" height="315" src="/iframe" frameborder="0"></iframe> -->
		<?php //echo $this->element('iframe', array('cantidad'=>null, 'category'=>1)); ?>
		<?php echo $this->element('iframe', array('category'=>1)); ?>
		<?php echo $this->element('iframe', array('category'=>2)); ?>
		<?php echo $this->element('iframe', array('category'=>5)); ?>
		<?php echo $this->element('iframe', array('category'=>9)); ?>
	</div>
</div>