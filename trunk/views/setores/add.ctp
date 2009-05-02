<div class="setores form">
<?php echo $form->create('Setor');?>
	<fieldset>
 		<legend><?php __('Add Setor');?></legend>
	<?php
		echo $form->input('descricao');
		echo $form->input('sla_id');
		echo $form->input('atende_chamado');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Setores', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Slas', true), array('controller'=> 'slas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Sla', true), array('controller'=> 'slas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Usuarios', true), array('controller'=> 'usuarios', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Usuario', true), array('controller'=> 'usuarios', 'action'=>'add')); ?> </li>
	</ul>
</div>
