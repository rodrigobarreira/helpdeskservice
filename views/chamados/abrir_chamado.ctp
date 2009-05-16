<div  class="chamados form">

<?php echo $form->create('Chamado', array('action' => 'abrirChamado'));?>
	<fieldset>
	<?php
	echo $form->input('usuario_id', array(
			'type' => 'hidden',
			'value' => $usuarioId
	));	 
	
	echo $form->input('aberto_por', array(
			'type' => 'hidden',
			'value' => $usuarioId
	));
	
	echo $form->input('setor_id', array (
			'empty' => '', 
			'options' => array ($areas),	
			'label' => 'Área',
			'type' => 'select',
	));	 

	// ajax
	echo $ajax->observeField( 'ChamadoSetorId', 
	    array(
	        'url' => array( 'action' => 'ajaxListaProblemaPorArea' ),
	    	'update' => 'problema'
	    ) 
	); 
	
	echo '<div id="problema">';
	echo $form->input('problema_id', array (
			'empty' => 'Selecione uma área primeiro',
			'label' => 'Tipo de Problema',
			'style' => 'width: 300px;',
			'div' => array('id' => 'ajax_problema'),
			'type' => 'select',
	));
	
	//ajax
	/*echo $ajax->observeField( 'ChamadoProblemaId', 
	    array(
	        'url' => array( 'action' => 'ajaxPrioridade' ),
	    	'update' => 'ajax_prioridade'
	    ) 
	); */
	echo '</div>';
	echo $form->input('prioridade_id', array (
		'empty' => '',
		'label' => 'Prioridade: ',
		'style' => 'width: 200px;',
		'div' => array('id' => 'ajax_prioridade'),
		'readonly'=> 'readonly'
		//'value' => $prioridade['Prioridade']['descricao']
	));
			
	echo $form->input('titulo', array(
			'label' => 'Título do Problema'
	));
	
	echo $form->input('data_hora_abertura', array(
			'type' => 'text',
			'label' => 'Data de Abertura',
			'style' => 'width: 250px;',
			'value' => date("d-m-Y H:m:s")
	));
	echo $form->input('aberto_por', array(
			'type' => 'hidden',
			'value' => $usuarioId
	));
	echo $form->input('descricao_problema');
	
	echo $form->input('status_id', array(
			//'type' => 'text',
			'label' => 'Status',
			'style' => 'width: 250px;',
			//'options' => array ($status),
			'options' => array ($status),
			
	));
	
	?>
	
	</fieldset>
<?php echo $form->end('Submit');?>
</div>

