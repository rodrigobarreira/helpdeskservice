<div class="chamados form">
<?php echo $form->create('Chamado');?>
	<fieldset>
 		<legend><?php __('Edit Chamado');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('problema_id');
		echo $form->input('usuario_id');
		echo $form->input('data_hora_abertura');
		echo $form->input('aberto_por');
		echo $form->input('descricao_problema');
		echo $form->input('descricao_solucao');
		echo $form->input('data_hora_atendimento');
		echo $form->input('status_id');
		echo $form->input('data_hora_encerramento');
		echo $form->input('responsavel_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Chamado.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Chamado.id'))); ?></li>
		<li><?php echo $html->link(__('List Chamados', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Usuarios', true), array('controller'=> 'usuarios', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Usuario', true), array('controller'=> 'usuarios', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Status', true), array('controller'=> 'status', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Status', true), array('controller'=> 'status', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Avaliacoes', true), array('controller'=> 'avaliacoes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Avaliacao', true), array('controller'=> 'avaliacoes', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Chamado Historicos', true), array('controller'=> 'chamado_historicos', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado Historico', true), array('controller'=> 'chamado_historicos', 'action'=>'add')); ?> </li>
	</ul>
</div>
