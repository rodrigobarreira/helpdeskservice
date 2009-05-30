<?php 

	echo $form->input('problema_id', array (
			'label' => 'Tipo de Problema',
			'type' => 'select',
			'name' => 'data[Chamado][problema_id]',
			'id' => 'ChamadoProblemaId',
			'options' => array($problemas),
			'div' => false,
			'style' => 'width: 260px;',
			'empty' => ''
	));
	//ajax
	echo $ajax->observeField( 'ChamadoProblemaId', 
	    array(
	        'url' => array( 'action' => 'ajaxPrioridade' ),
	    	'update' => 'ajax_prioridade',
	    	'indicator' => 'loadAjax'
	    ) 
	); 	
	
?>