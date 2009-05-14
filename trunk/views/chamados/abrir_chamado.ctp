<script type="text/javascript" language="javascript">
var $j  = jQuery;
$j.noConflict();

$j(document).ready(function(){
	$j("#ChamadoSetorId").change(function(){
		
		var XMLHttpRequest = $j.ajax({
			type: "POST",
			url: "/helpdesksystem/chamados/ajaxListaProblemaPorArea/"+this.value,
			sucess: function(msg){
				alert(msg)
			},
			complete: function(problemas){
				//$j("#ajax_problema").html(c)
				$j("#ajax_problema").html(XMLHttpRequest.responseText);			}
		});
		//$j("#ajax_problema").html(XMLHttpRequest.responseText);
		
	});

	$j("#ChamadoProblemaId").change(function(){
		XMLHttpRequest = null;
		var XMLHttpRequest = $j.ajax({
			type: "POST",
			url: "/helpdesksystem/chamados/ajaxPrioridade/"+this.value,
			sucess: function(msg){
				alert(msg)
			},
			complete: function(prioridades){
				//$j("#ajax_problema").html(c)
				$j("#ajax_prioridade").html(prioridades);			}
		});
		//$j("#ajax_problema").html(XMLHttpRequest.responseText);
		
	});
});

</script>
<div  class="chamados form">

<?php echo $form->create('Chamado', array('action' => 'abrirChamado'));?>
	<fieldset>
	<?php
	echo $form->input('usuario_id', array(
			//'type' => 'hidden',
			'value' => $usuarioId
	));	 
	
	echo $form->input('aberto_por', array(
			//'type' => 'hidden',
			'value' => $usuarioId
	));
	
	echo $form->input('setor_id', array (
			'empty' => '', 'options' => array ($areas),	'label' => '�rea',
			'onchange' => 'return false'
	));	 	
	
	echo $form->input('problema_id', array (
			'empty' => 'Selecione uma �rea primeiro',
			'label' => 'Tipo de Problema',
			'style' => 'width: 300px;',
			'div' => array('id' => 'ajax_problema'),
			'type' => 'select',
			'option' => $problemas,
			'onchange' => 'return false'
	));
	 
	echo $form->input('prioridade_id', array (
		'empty' => '',
		'label' => 'Prioridade: ',
		'style' => 'width: 200px;',
		'div' => array('id' => 'ajax_prioridade'),
		'value' =>$prioridade['Prioridade']['descricao']
	));
			
	echo $form->input('titulo', array(
			'label' => 'T�tulo do Problema'
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

