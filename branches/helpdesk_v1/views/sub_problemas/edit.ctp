<div class="subProblemas form">
<?php echo $form->create('SubProblema');?>
	<fieldset>
 		<legend><?php __('Edit SubProblema');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('problema_id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

