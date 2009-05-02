<div class="status form">
<?php echo $form->create('Status');?>
	<fieldset>
 		<legend><?php __('Edit Status');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
