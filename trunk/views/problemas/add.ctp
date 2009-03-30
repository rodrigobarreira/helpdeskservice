<div class="problemas form">
<?php echo $form->create('Problema');?>
	<fieldset>
 		<legend><?php __('Add Problema');?></legend>
	<?php
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Problemas', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Sub Problemas', true), array('controller'=> 'sub_problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Sub Problema', true), array('controller'=> 'sub_problemas', 'action'=>'add')); ?> </li>
	</ul>
</div>
