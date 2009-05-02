<div class="usuarios form">
<?php echo $form->create('Usuario');?>
	<fieldset>
 		<legend><?php __('Edit Usuario');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('grupo_id');
		echo $form->input('setor_id');
		echo $form->input('matricula');
		echo $form->input('nome');
		echo $form->input('senha');
		echo $form->input('email');
		echo $form->input('celular');
		echo $form->input('telefone');
		echo $form->input('ramal');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

