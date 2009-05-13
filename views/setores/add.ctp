<div class="setores form">
<?php echo $form->create('Setor');?>
	<fieldset>
 		<legend><?php __('Add Setor');?></legend>
	<?php
		echo $form->input('descricao');
		echo $form->input('sla_id');
		echo $form->input('atende_chamado');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Setores', true), array('action'=>'index'));?></li>
	</ul>
</div>
