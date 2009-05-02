<div class="avaliacoes form">
<?php echo $form->create('Avaliacao');?>
	<fieldset>
 		<legend><?php __('Add Avaliacao');?></legend>
	<?php
		echo $form->input('data_hora');
		echo $form->input('nivel');
		echo $form->input('chamado_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Avaliacoes', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
	</ul>
</div>
