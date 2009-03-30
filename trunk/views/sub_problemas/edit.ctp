<div class="subProblemas form">
<?php echo $form->create('SubProblema');?>
	<fieldset>
 		<legend><?php __('Edit SubProblema');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('problema_id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('SubProblema.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('SubProblema.id'))); ?></li>
		<li><?php echo $html->link(__('List SubProblemas', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
	</ul>
</div>
