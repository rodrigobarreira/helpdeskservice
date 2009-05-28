<div id="loadAjax" style="position: absolute; margin-left: 250px; display:none;">
	<?php echo $html->image('LoadAjax.gif');?>
</div>
<div  class="chamados form">

<?php echo $form->create('Chamado', array('url' => array('controller' => 'home', 'action' => 'abrirChamado')));
$ajax->form(array('type' => 'post',
    'options' => array(
        'model'=>'Chamado',
        'update'=>'main_conteudo',
        'url' => array(
            'controller' => 'home',
            'action' => 'abrirChamado'
        )
    )
));
;?>
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
	    	'update' => 'problema',
	    	'indicator' => 'loadAjax'
	    ) 
	); 
	
	echo '<div id="problema" class="input text required">';
	echo $form->input('problema_id', array (
			'empty' => 'Selecione uma área primeiro',
			'label' => 'Tipo de Problema',
			'style' => 'width: 250px;',
			//'div' => array('id' => 'ajax_problema'),
			'type' => 'select',
			'name' => 'data[Chamado][problema_id]',
			'id' => 'ChamadoProblemaId',
			'options' => array(),
			'class' => 'input text required'
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
<?php 
echo $form->end('Registrar',array(
	'update'=>'main_conteudo',
    'url' => array(
    	'controller' => 'home',
        'action' => 'abrirChamado'
    )
));
echo $form->button('Voltar', array(
	'type'=>'button', 
	'id' => 'btnVoltar', 
	'onClick'=>'history.go(-1)',
	//'style' => 'lear: both;'
));
?>
</fieldset>
</div>

