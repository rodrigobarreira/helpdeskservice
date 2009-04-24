<div class="avaliacoes form">
<?php echo $form->create('Avaliacao');?>
	<fieldset>
 		<legend><?php __('Edit Avaliacao');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('data');
		echo $form->input('hora');
		echo $form->input('nivel');
		echo $form->input('chamado_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

