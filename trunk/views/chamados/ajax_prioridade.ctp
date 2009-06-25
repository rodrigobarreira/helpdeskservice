<?php
echo $form->input('prioridade_id', array (
	'empty' => '',
	'label' => 'Prioridade: ',
	'style' => 'width: 100px;',
	'div' => false,
	'readonly'=> 'readonly',
	'value' =>$prioridade['Prioridade']['descricao'],
));

?>