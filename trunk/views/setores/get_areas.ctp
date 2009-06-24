<?php 

$st = array();
foreach($dados as $chave => $valor){
	$st[$chave] = utf8_decode($valor);
}

echo $form->input('area', array(
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