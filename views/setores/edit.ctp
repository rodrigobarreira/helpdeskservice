<div class="setores form">
<?php echo $form->create('Setor');?>
	<fieldset>
 		<legend><?php __('Edit Setor');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

