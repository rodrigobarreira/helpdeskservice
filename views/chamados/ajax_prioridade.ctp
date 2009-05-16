<?php 
echo $form->input('prioridade_id', array (
			'empty' => '',
			'label' => 'Prioridade: ',
			'style' => 'width: 200px;',
			'div' => array('id' => 'ajax_prioridad'),
			'value' =>$prioridade['Prioridade']['descricao'],
			'readonly'=> 'readonly'
	));
	
?>