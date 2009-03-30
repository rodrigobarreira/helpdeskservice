<div class="chamados form">
<?php echo $form->create('Chamado');?>
	<fieldset>
 		<legend><?php __('Add Chamado');?></legend>
	<?php
		echo $form->input('sub_problema_id');
		echo $form->input('usuario_id');
		echo $form->input('data_abertura');
		echo $form->input('hora_abertura');
		echo $form->input('descricao_problema');
		echo $form->input('descricao_solucao');
		echo $form->input('prioridade_id');
		echo $form->input('status_id');
		echo $form->input('data_limite');
		echo $form->input('hora_limite');
		echo $form->input('data_fechamento');
		echo $form->input('hora_fechamento');
		echo $form->input('responsavel_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Chamados', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Sub Problemas', true), array('controller'=> 'sub_problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Sub Problema', true), array('controller'=> 'sub_problemas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Usuarios', true), array('controller'=> 'usuarios', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Usuario', true), array('controller'=> 'usuarios', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Prioridades', true), array('controller'=> 'prioridades', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Prioridade', true), array('controller'=> 'prioridades', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Status', true), array('controller'=> 'status', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Status', true), array('controller'=> 'status', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Avaliacoes', true), array('controller'=> 'avaliacoes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Avaliacao', true), array('controller'=> 'avaliacoes', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Chamado Historicos', true), array('controller'=> 'chamado_historicos', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado Historico', true), array('controller'=> 'chamado_historicos', 'action'=>'add')); ?> </li>
	</ul>
</div>
