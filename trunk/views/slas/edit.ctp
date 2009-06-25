<div class="slas form"><?php echo $form->create('Sla');?>
<fieldset><legend><?php __('Edit Sla');?></legend> <?php
echo $form->input('id');
echo $form->input('tempo');
echo $form->input('descricao');
?></fieldset>
<?php echo $form->end('Submit');?></div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Sla.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Sla.id'))); ?></li>
	<li><?php echo $html->link(__('List Slas', true), array('action'=>'index'));?></li>
</ul>
</div>
