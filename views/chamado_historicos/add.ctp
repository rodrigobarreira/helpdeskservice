<div class="chamadoHistoricos form">
<?php echo $form->create('ChamadoHistorico');?>
	<fieldset>
 		<legend><?php __('Add ChamadoHistorico');?></legend>
	<?php
		echo $form->input('data_hora_incial');
		echo $form->input('data_hora_final');
		echo $form->input('chamado_id');
		echo $form->input('usuario_id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List ChamadoHistoricos', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Usuarios', true), array('controller'=> 'usuarios', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Usuario', true), array('controller'=> 'usuarios', 'action'=>'add')); ?> </li>
	</ul>
</div>
