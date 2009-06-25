<div class="chamados form"><?php echo $form->create('Chamado');?>
<fieldset><legend><?php __('Add Chamado');?></legend> <?php
echo $form->input('problema_id');
echo $form->input('usuario_id');
echo $form->input('data_hora_abertura');
echo $form->input('aberto_por');
echo $form->input('descricao_problema');
echo $form->input('descricao_solucao');
echo $form->input('data_hora_atendimento');
echo $form->input('status_id');
echo $form->input('data_hora_encerramento');
echo $form->input('responsavel_id');
?></fieldset>
<?php echo $form->end('Submit');?></div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('List Chamados', true), array('action'=>'index'));?></li>
</ul>
</div>
