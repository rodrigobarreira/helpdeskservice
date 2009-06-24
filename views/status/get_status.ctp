<?php 

$st = array();
foreach($status as $chave => $valor){
	$st[$chave] = utf8_encode($valor);
}

echo $form->input('status', array(
	'type' => 'select',
	'options' => array($st),
	'empty' => false,
	'label' => false,
	'id' => 'valor',
	'style' => 'clear: right;',
	'div' => false,
	//'class' => 'campo'
));

?>