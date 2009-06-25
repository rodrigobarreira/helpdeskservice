<?php

$st = array();
foreach($dados as $chave => $valor){
	$st[$chave] = ($valor);
}

echo $form->input('area', array(
	'type' => 'select',
	'options' => array($st),
	'empty' => false,
	'label' => false,
	'id' => 'valor',
	'style' => 'clear: right; margin-left: 10px',
	'div' => false,
//'class' => 'campo'
));

?>