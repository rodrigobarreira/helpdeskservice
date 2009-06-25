<div class="grupos form"><?php echo $form->create('Grupo');?>
<fieldset><legend><?php __('Edit Grupo');?></legend> <?php
echo $form->input('id');
echo $form->input('descricao');
?></fieldset>
<?php echo $form->end('Submit');?></div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Grupo.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Grupo.id'))); ?></li>
	<li><?php echo $html->link(__('List Grupos', true), array('action'=>'index'));?></li>
</ul>
</div>
