<div><?php echo $form->create('Pesquisar Usu�rio');?>
<fieldset><legend><?php ?></legend> <?php 
echo $form->input('matricula');
?></fieldset>
<?php echo $form->end('Submit')?></div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('List Usuario', true), array('action'=>'index'));?></li>
</ul>
</div>
