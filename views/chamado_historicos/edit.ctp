<div class="chamadoHistoricos form">
<?php echo $form->create('ChamadoHistorico');?>
	<fieldset>
 		<legend><?php __('Edit ChamadoHistorico');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('data');
		echo $form->input('hora');
		echo $form->input('chamado_id');
		echo $form->input('usuario_id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
