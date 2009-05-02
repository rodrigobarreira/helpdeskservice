<div class="chamadoHistoricos form">
<?php echo $form->create('ChamadoHistorico');?>
	<fieldset>
 		<legend><?php __('Edit ChamadoHistorico');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('data_hora_incial');
		echo $form->input('data_hora_final');
		echo $form->input('chamado_id');
		echo $form->input('usuario_id');
		echo $form->input('descricao');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('ChamadoHistorico.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('ChamadoHistorico.id'))); ?></li>
		<li><?php echo $html->link(__('List ChamadoHistoricos', true), array('action'=>'index'));?></li>
	</ul>
</div>
