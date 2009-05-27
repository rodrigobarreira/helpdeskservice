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
	
	echo '<div class="input text required">'; 
	echo $form->input('setor_id', array (
			'empty' => '', 
			'options' => array ($areas),	
			'label' => 'Área',
			'type' => 'select',
			'class' => 'input text required'
	));	 
	echo '</div>';
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
			'style' => 'width: 250px;',
			'div' => array('id' => 'ajax_problema'),
			'type' => 'select',
			'options' => array()
	));
	echo '</div>';
	
	echo '<div id="ajax_prioridade">';
	echo $form->input('prioridade_id', array (
		'empty' => '',
		'label' => 'Prioridade: ',
		'style' => 'width: 100px;',
		//'div' => array('id' => 'ajax_prioridade'),
		'readonly'=> 'readonly'
		//'value' => $prioridade['Prioridade']['descricao']
	));
	echo "</div>";
	echo $form->input('titulo', array(
			'label' => 'Título do Problema',
			'style' => 'float:left;clear: left;width: 600px;'
	));
	
	/*
	echo $form->input('data_hora_abertura', array(
			'type' => 'text',
			'label' => 'Data de Abertura',
			'style' => 'width: 250px;',
			'value' => date("d-m-Y H:m:s")
	));
	*/
	
	echo $form->input('aberto_por', array(
			'type' => 'hidden',
			'value' => $usuarioId
	));
	echo $form->input('descricao_problema', array(
			'label' => 'Descrição do Problema',
			'style' => 'float:left;width: 600px;'
	));
	
	?>
	
	</fieldset>
	<br>
	<fieldset style="text-align: left;">
<?php echo $form->end('Registrar');?>
</fieldset>
</div>

