<div class="status form"><?php echo $form->create('Status');?>
<fieldset><legend><?php __('Edit Status');?></legend> <?php
echo $form->input('id');
echo $form->input('descricao');
?></fieldset>
<?php echo $form->end('Submit');?></div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Status.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Status.id'))); ?></li>
	<li><?php echo $html->link(__('List Status', true), array('action'=>'index'));?></li>
	<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?>
	</li>
</ul>
</div>
