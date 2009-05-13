<?php 
echo $form->input('problema_id', array (
		'options' => array (
			$problemas
		),
		'empty' => '',
		'label' => 'Problema',
		'style' => 'width: 200px;',
		'div' => array('id' => 'ajax_problema')
	));
?>