<div class="grupos form">
<?php echo $form->create('Grupo');?>
	<fieldset>
 		<legend><?php __('Add Grupo');?></legend>
	<?php
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
