<div class="prioridades form">
<?php echo $form->create('Prioridade');?>
	<fieldset>
 		<legend><?php __('Add Prioridade');?></legend>
	<?php
		echo $form->input('descricao');
		echo $form->input('tempo_maximo');
		echo $form->input('unidade_tempo');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Prioridades', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
	</ul>
</div>
