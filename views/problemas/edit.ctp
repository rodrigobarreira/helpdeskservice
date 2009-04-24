<div class="problemas form">
<?php echo $form->create('Problema');?>
	<fieldset>
 		<legend><?php __('Edit Problema');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

