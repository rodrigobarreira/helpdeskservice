<div class="problemas form">
<?php echo $form->create('Problema');?>
	<fieldset>
 		<legend><?php __('Edit Problema');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Problema.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Problema.id'))); ?></li>
		<li><?php echo $html->link(__('List Problemas', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Sub Problemas', true), array('controller'=> 'sub_problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Sub Problema', true), array('controller'=> 'sub_problemas', 'action'=>'add')); ?> </li>
	</ul>
</div>
