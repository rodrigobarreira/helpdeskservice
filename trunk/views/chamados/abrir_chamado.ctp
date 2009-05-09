<script type="text/javascript" language="javascript">
var $j  = jQuery;
$j.noConflict();

$j(document).ready(function(){
	$j("#ChamadoSetorId").change(function(){
		$j.ajax({
			type: "POST",
			url: "/helpdesksystem/chamados/ajaxListaProblemaPorArea/"+this.value,
			sucess: function(msg){
				alert(msg)
			},
			complete: function(c){
				//$j("#ajax_problema").html(c)
			}
		});
	});
});

</script>
<div  class="chamados form">

<?php echo $form->create('Chamado', array('action' => 'abrirChamado'));?>
	<fieldset>
	<?php
	echo $form->input('usuario_id', array(
			'type' => 'hidden',
			'value' => $usuarioId
	));	 
	
	echo $form->input('setor_id', array (
			'empty' => '', 'options' => array ($areas),	'label' => 'Área',
			/*'onchange' => $ajax->remoteFunction(
				array(
					'url' =>  array ('controller' => 'chamados', 'action' => 'ajaxListaProblemaPorArea', 7),
					'update' => 'ajax_problema',
				)
			)*/
	));	 	
	
	echo $form->input('problema_id', array (
			'options' => array ($problemas),
			'empty' => '',
			'label' => 'Tipo de Problema',
			'style' => 'width: 200px;',
			'div' => array('id' => 'ajax_problema')
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

