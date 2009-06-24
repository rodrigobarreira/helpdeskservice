<div id="loadAjax" style="position: absolute; margin-left: 250px; display:none;">
	<?php echo $html->image('LoadAjax.gif');?>
	
</div><div class="chamados view">

<?php 
//pr($chamado['VwChamado']);
//pr($problemas );

echo $form->create('Chamado', array('url' => array(
	'controller' => 'chamados', 
	'action' => 'edit',
	$chamado['VwChamado']['chamado_id'] 
)));

$ajax->form(array('type' => 'post',
    'options' => array(
        'model'=>'Chamado',
        'update'=>'main_conteudo',
        'url' => array(
            'controller' => 'chamado',
            'action' => 'edit',
			$chamado['VwChamado']['chamado_id']
        )
    )
));
	?>
		
<fieldset>
	
	<legend> Dados do Chamado </legend>
	<?php
	
	echo $form->input('id', array (
			'value' => $chamado['VwChamado']['chamado_id'],
			'label' => 'Número: ',
			'style'=> 'width: 50px; ',
			'type' => 'text',
			'div' => 'campoBloqueado',
			'readonly' => 'readonly'
		
	));	 
	
	echo $form->input('VwChamado.abertura', array(
			'type' => 'text',
			'label' => 'Data de Abertura',
			'style' => 'width: 120px;',
			'value' => $time->dataBrasileira($chamado['VwChamado']['chamado_abertura']),
			'div' => 'campoBloqueado',
			'readonly' => 'readonly'
	));
	
			echo $form->input('usuario_nome', array(
				'readonly' => 'readonly',
				'label' => 'Solicitante',
				'value' => $chamado['VwChamado']['solicitante_nome'],
				'type' => 'text',
 				'div' => 'campoBloqueado',
				'style' => 'width: 210px;',
			));
			
			echo $form->input('usuario_id', array(
				'readonly' => 'readonly',
				'label' => 'Solicitante',
				'value' => $chamado['VwChamado']['solicitante_id'],
				'type' => 'hidden',
 				'div' => 'campoBloqueado',
				'style' => 'width: 210px;',
			));
			
			echo $form->input('solicitante_setor_nome', array(
				'readonly' => 'readonly',
				'label' => 'Setor',
				'value' => $chamado['VwChamado']['solicitante_setor_nome'],
				'type' => 'text',
				'div' => 'campoBloqueado',
			));
		
	echo $form->input('setor_id', array (
			'options' => array ($areas),	
			'label' => 'Área Responsável',
			'type' => 'select',
			'div' => array ('class' => 'campo'),
			'style' => 'width: 220px;',
			'value' => $chamado['VwChamado']['problema_tipo_area_id'],
			
	));	 
	echo $ajax->observeField( 'ChamadoSetorId', 
	    array(
	        'url' => array(
				'controller' => 'chamados',
	    		'action' => 'ajaxListaProblemaPorArea' ),
	    	'update' => 'problema',
	    	'indicator' => 'loadAjax'
	    ) 
	); 
	
	echo $form->input('problema_id', array (
			'label' => 'Tipo de Problema',
			//'div' => array('id' => 'ajax_problema'),
			'type' => 'select',
			'name' => 'data[Chamado][problema_id]',
			'id' => 'ChamadoProblemaId',
			'options' => $problemas,
			'div' => array ('class' => 'campo', 'id' => 'problema', ),
			'style' => 'width: 270px;',
			'value' => $chamado['VwChamado']['problema_tipo_id'],
	));
	
	echo $form->input('prioridade', array (
		'label' => 'Prioridade: ',
		'style' => 'width: 100px;',
		'div' => array('class' => 'campoBloqueado', 'id' => 'ajax_prioridade'),
		'readonly'=> 'readonly',
		'value' => $chamado['VwChamado']['chamado_prioridade_descricao'],
		'type' => 'text'
	));
	
	
	echo $form->input('titulo', array(
			'label' => 'Título do Problema:',
			'value' => $chamado['VwChamado']['chamado_titulo'],
			'div' => 'campoBloqueado',
			'style'=> 'width: 235px;',
			'readonly' => 'readonly'
	));
	
	
	
	//if ($chamado['VwChamado']['chamado_status_id'] != 3){
		// diferente de aguardando atendimento
		echo $form->input('responsavel_nome', array(
				'type' => 'text',
				'label' => 'Responsável',
				'style' => 'width: 170px;',
				//'options' => array ($status),
				'value' => $chamado['VwChamado']['chamado_responsavel_nome'],
				'div' => 'campoBloqueado',
				'readonly' => 'readonly'
				
		));
		
		echo $form->input('responsavel_id', array(
				'type' => 'hidden',
				'label' => 'Responsável',
				'style' => 'width: 170px;',
				//'options' => array ($status),
				'value' => $chamado['VwChamado']['chamado_responsavel_id'],
				'div' => 'campoBloqueado',
				'readonly' => 'readonly'
				
		));
		
		$status_padrao = $chamado['VwChamado']['chamado_status_id'];
		if ($chamado['VwChamado']['chamado_status_id'] == 3){
			$status_padrao = 1;
		}
		
		echo $form->input('status_id', array (
			'type' => 'select',
			'value' => $status_padrao,
			'label' => 'Status:',
			'div' => 'campo',
			'readonly' => 'readonly',
			'style' => 'width: 170px;',
			'options' => $status
	));
	
	echo $form->input('descricao', array (
			'type' => 'textarea',
			'value' => $chamado['VwChamado']['chamado_descricao_problema'],
			'label' => 'Descrição do Problema:',
			'div' => 'campoBloqueado',
			'style' => 'width: 618px; height: 50px;',
			'readonly' => 'readonly'
	));
	
	echo $form->input('ChamadoHistorico.descricao', array (
			'type' => 'textarea',
			//'value' => $chamado['VwChamado']['chamado_descricao_problema'],
			'label' => 'Atendimento:',
			'div' => 'campo',
			'style' => 'width: 618px; height: 50px;',
			
	));
	
	echo $form->input('ChamadoHistorico.data_hora_inicial', array (
			'type' => 'hidden',
			//'value' => $chamado['VwChamado']['chamado_descricao_problema'],
			'label' => 'Data Inicial:',
			'div' => 'campo',
			'style' => 'widdth: 618px; height: 50px;',
			'value' => date("Y-m-d H:i:s")
			
	));
	
	echo $form->input('ChamadoHistorico.usuario_id', array (
			'type' => 'hidden',
			//'value' => $chamado['VwChamado']['chamado_descricao_problema'],
			//'label' => 'Data Inicial:',
			'div' => 'campo',
			'style' => 'widdth: 618px; height: 50px;',
			'value' => $usuarioId
			
	));
	
	echo $form->input('ChamadoHistorico.chamado_id', array (
			'type' => 'hidden',
			//'value' => $chamado['VwChamado']['chamado_descricao_problema'],
			//'label' => 'Data Inicial:',
			'div' => 'campo',
			'style' => 'widdth: 618px; height: 50px;',
			'value' => $chamado['VwChamado']['chamado_id']
			
	));
	
	
	if ($chamado['VwChamado']['chamado_status_id'] == 4){
		// igual a encerrada
		echo $form->input('data_hora_encerramento', array(
			'type' => 'text',
			'label' => 'Data de Encerramento',
			'style' => 'width: 195px;',
			'value' => $chamado['VwChamado']['data_hora_encerramento'],
			'div' => 'campoBloqueado',
			'readonly' => 'readonly'
		));
		
		
		
		
	} 
	

	 //p/r($historicos);
	 
	?>
	
	
		<div class="campoBloqueado" >
	<label>Histórico do Chamado</label>
	<?php
	if (count($historicos) > 0){
		?>
		<table cellpadding="0" cellspacing="0" style="margin-left: 0px; width: 630px;">
		<?php 
		$i =0;
		//echo '<table style="width=100%;">';
		foreach($historicos as $historico){
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
			<tr  <?php echo $class;?> >
			<?php 
	
				echo '<td style="width:30%;">Em ' . 
				$time->dataBrasileira($historico['ChamadoHistorico']['data_hora_inicial']) . " por " . $historico['Usuario']['nome'] . "</td>";
				echo "<td>" . $historico['ChamadoHistorico']['descricao']  . "</td>";
			echo "</tr>";
		}
		echo '</table>';
	}else{
	
		echo $form->input('historico', array (
			'type' => 'textarea',
			'value' => 'Nenhum Histórico foi inserido.',
			'label' => false,
			'div' => false,
			'style' => 'width: 618px;height: 20px;',
			'readonly' => 'readonly'
	));
	}
	?>
	
	</div>
	</fieldset>
	<fieldset style="text-align: left;">
	<div class="botao">
	<?php
		echo $form->submit('Salvar', array(
			//'type'=>'button', 
			'id' => 'btnSalvar', 
			//'onClick'=> 'alterarChamado('.$chamado['VwChamado']['chamado_id'].')',
			//'onClick'=> '(location.href="'.$html->url(array('controller' => 'chamados', 'action' => 'save', $chamado['VwChamado']['chamado_id'])).'")'
			'div' => false
			
		));
	?>
	</div>
	<div class="botao">
	<?php
	echo $form->button('Cancelar', array(
		'type'=>'button', 
		'id' => 'btnVoltar', 
		'onClick'=>'history.go(-1)',
	));
	?>
</div>
</fieldset>
	
</div>
