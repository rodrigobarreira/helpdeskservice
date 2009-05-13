<div class="avaliacoes form">
<?php echo $form->create('Avaliacao');?>
	<fieldset>
 		<legend><?php __('Edit Avaliacao');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('data_hora');
		echo $form->input('nivel');
		echo $form->input('chamado_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Avaliacao.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Avaliacao.id'))); ?></li>
		<li><?php echo $html->link(__('List Avaliacoes', true), array('action'=>'index'));?></li>
	</ul>
</div>
