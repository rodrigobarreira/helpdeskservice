<div class="status form">
<?php echo $form->create('Status');?>
	<fieldset>
 		<legend><?php __('Add Status');?></legend>
	<?php
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

