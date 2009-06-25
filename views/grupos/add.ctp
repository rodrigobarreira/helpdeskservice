<div class="grupos form"><?php echo $form->create('Grupo');?>
<fieldset><legend><?php __('Add Grupo');?></legend> <?php
echo $form->input('descricao');
?></fieldset>
<?php echo $form->end('Submit');?></div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('List Grupos', true), array('action'=>'index'));?></li>
</ul>
</div>
