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
		<li><?php echo $html->link(__('List Slas', true), array('controller'=> 'slas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Sla', true), array('controller'=> 'slas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Setores', true), array('controller'=> 'setores', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Setor', true), array('controller'=> 'setores', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
	</ul>
</div>
