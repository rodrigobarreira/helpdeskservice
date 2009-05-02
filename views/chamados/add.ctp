<div class="chamados form">
<?php echo $form->create('Chamado');?>

<fieldset><legend><?php __('Abertura de Chamado');?></legend> <?php
echo $form->input('problema_id', array(
	'empty' => 'Selecione um Problema'
));
echo $form->input('usuario_id', array(
	'value' => $usuarioId, 
	'type' => 'text',
	'label' => 'Solicitante'
));
echo $form->input('descricao_problema', array(
	'label' => 'Descrição do Problema'
));

echo $form->input('status_id', array(
	'label' => 'status',
	'value' => 1, // define o status inicial do chamado
));
?></fieldset>
<?php echo $form->end('Submit');?></div>
