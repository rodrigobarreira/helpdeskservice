<script type="text/javascript" language="javascript">

//jQuery.noConflict();

var $j = jQuery;

$j(document).ready(function() {
	/*$j("#ChamadoSetorId").change(function() {
		var area = ($j("#ChamadoSetorId").val());
		if (area != null){
			$j("#ChamadoProblemaId").focus();
		}
	});

	$j("#ChamadoProblemaId").change(function() {
		var problema = ($j("#ChamadoProblemaId").val());
		if (problema != null){
			$j("#ChamadoTitulo").focus();
		}
	})
	;*/
});

</script>

<div id="loadAjax" style="position: absolute; margin-left: 250px; display:none;">
	<?php echo $html->image('LoadAjax.gif');?>
</div>
<div  class="chamados form">

<?php 
//pr($problemas);
echo $form->create('Chamado', array('url' => array('controller' => 'home', 'action' => 'abrirChamado')));
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
?>
	<fieldset>
	<legend>Formulário de abertura de Chamado</legend>
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
			'div' => array ('class' => 'campo'),
			'style' => 'width: 220px;',
			
	));	 

	// ajax
	echo $ajax->observeField( 'ChamadoSetorId', 
	    array(
	        'url' => array( 'action' => 'ajaxListaProblemaPorArea' ),
	    	'update' => 'problema',
	    	'indicator' => 'loadAjax',
	    	'complete' => '$j("#ChamadoProblemaId").focus();'
	    ) 
	); 
	
	echo $form->input('problema_id', array (
			'empty' => 'Selecione uma área primeiro',
			'label' => 'Tipo de Problema',
			//'div' => array('id' => 'ajax_problema'),
			'type' => 'select',
			'name' => 'data[Chamado][problema_id]',
			'id' => 'ChamadoProblemaId',
			'options' => @array($problemas),
			'div' => array ('class' => 'campo', 'id' => 'problema', ),
			'style' => 'width: 270px;',
	));
	
	echo $form->input('prioridade_id', array (
		'empty' => '',
		'label' => 'Prioridade: ',
		'style' => 'width: 100px;',
		'div' => array('class' => 'campoBloqueado', 'id' => 'ajax_prioridade'),
		'readonly'=> 'readonly'
	));

	echo $form->input('titulo', array(
			'label' => 'Título do Problema',
			'style' => 'width: 620px;',
			'div' => 'campo'
	));
	
	echo $form->input('aberto_por', array(
			'type' => 'hidden',
			'value' => $usuarioId
	));
	
	echo $form->input('descricao_problema', array(
			'label' => 'Descrição do Problema',
			'style' => 'width: 620px; margin-right: 15px; height: 50px',
			'div' => 'campo'
	));
	
	?>
	
	</fieldset>

	<fieldset style="text-align: left;">
	
	<div class="botao">
	<?php 
	echo $form->button('Registrar',array(
		'type'=>'submit',
		'update'=>'main_conteudo',
	    'url' => array(
	    	'controller' => 'home',
	        'action' => 'abrirChamado'
	    ),
	));
	?>
	</div>
	<div class="botao">
	<?php 
	echo $form->button('Voltar', array(
		'type'=>'button', 
		'id' => 'btnVoltar', 
		'onClick'=>'history.go(-1)',
	));
	?>
	</div>
	</fieldset>

</div>

