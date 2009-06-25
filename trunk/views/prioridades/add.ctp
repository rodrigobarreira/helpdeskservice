<div class="prioridades form"><?php echo $form->create('Prioridade');?>
<fieldset><legend><?php __('Add Prioridade');?></legend> <?php
echo $form->input('tempo');
echo $form->input('descricao');
?></fieldset>
<?php echo $form->end('Submit');?></div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('List Prioridades', true), array('action'=>'index'));?></li>
	<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?>
	</li>
</ul>
</div>
