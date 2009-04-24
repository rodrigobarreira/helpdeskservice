<div class="grupos form">
<?php echo $form->create('Grupo');?>
	<fieldset>
 		<legend><?php __('Edit Grupo');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
