<div class="prioridades form">
<?php echo $form->create('Prioridade');?>
	<fieldset>
 		<legend><?php __('Add Prioridade');?></legend>
	<?php
		echo $form->input('descricao');
		echo $form->input('tempo_maximo');
		echo $form->input('unidade_tempo');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
