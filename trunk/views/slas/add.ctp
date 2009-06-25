<div class="slas form"><?php echo $form->create('Sla');?>
<fieldset><legend><?php __('Add Sla');?></legend> <?php
echo $form->input('tempo');
echo $form->input('descricao');
?></fieldset>
<?php echo $form->end('Submit');?></div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('List Slas', true), array('action'=>'index'));?></li>
</ul>
</div>
