<?php
echo $this->Html->css(array('vendor/bootstrap.min', 'tracks/iframe')
  , null
  , array('inline' => true));

echo $this->element('iframe', array('category'=>1, 'cantidad'=>1));
echo $this->element('iframe', array('category'=>2, 'cantidad'=>1));
echo $this->element('iframe', array('category'=>5, 'cantidad'=>1));
echo $this->element('iframe', array('category'=>9, 'cantidad'=>1));
?>
