<div class="problemas form">
<?php echo $form->create('Problema');?>
	<fieldset>
 		<legend><?php __('Add Problema');?></legend>
	<?php
		echo $form->input('descricao');
		echo $form->input('sla_id');
		echo $form->input('setor_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Problemas', true), array('action'=>'index'));?></li>
	</ul>
</div>
