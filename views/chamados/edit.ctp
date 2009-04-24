<div class="chamados form">
<?php echo $form->create('Chamado');?>
	<fieldset>
 		<legend><?php __('Edit Chamado');?></legend>
	<?php
		echo $form->input('id');
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

