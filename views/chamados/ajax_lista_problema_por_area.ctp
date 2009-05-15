<?php 
	echo $form->input('problema_id', array (
			'empty' => '',
			'label' => 'Tipo de Problema',
			'style' => 'width: 300px;',
			'div' => array('id' => 'ajax_problema'),
			'type' => 'select',
			'options' => array($problemas),
			'onchange' => $ajax->remoteFunction( 
			    array( 
			        'url' => array( 
			        	'controller' => 'chamados', 
			        	'action' => 'ajaxPrioridade', 
			    		1
			    	), 
			        'update' => 'ajax_prioridade' 
			    ) 
			)
	));
	
	
?>