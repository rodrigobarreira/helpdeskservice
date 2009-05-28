<?php 
	echo $form->input('problema_id', array (
			'empty' => '',
			'label' => 'Tipo de Problema',
			'style' => 'width: 250px;',
			//'div' => array('id' => 'ajax_problema'),
			'type' => 'select',
			'name' => 'data[Chamado][problema_id]',
			'id' => 'ChamadoProblemaId',
			'options' => array($problemas),
			'class' => false
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