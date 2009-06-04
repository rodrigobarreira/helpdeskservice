<div class="chamados view">
	<fieldset style="text-align: left;">
	<div class="botao">
	<?php
		echo $form->button('Alterar', array(
			'type'=>'button', 
			'id' => 'btnAlterar', 
			//'onClick'=> 'alterarChamado('.$chamado['VwChamado']['chamado_id'].')',
			'onClick'=> '(location.href="'.$html->url(array('controller' => 'atendimento', 'action' => 'alterarChamado')).'")'
			
		));
	?>
	</div>
	<div class="botao">
	<?php
	if($chamado['VwChamado']['chamado_status_id'] == 3){ // aguardadndo atendimento
		echo $form->button('Atender', array(
			'type'=>'button', 
			'id' => 'btnAtender', 
			'onClick'=>'atenderChamado('.$chamado['VwChamado']['chamado_id'].')',
			'div' => 'botao',
		));
	?>

	<?php
	}else{
		echo $form->button('Voltar', array(
			'type'=>'button', 
			'id' => 'btnVoltar', 
			'onClick'=>'history.go(-1)',
		));
	}
	?>
</div>
	<?php
	//echo $html->link(__('Alterar', true), array('controller'=> 'atendimento', 'action'=>'alterarChamado', $chamado['Chamado']['id']) );
	
	//echo $html->link(__('Atender Chamado', true), array('controller'=> 'atendimento', 'action'=>'atenderChamado', $chamado['Chamado']['id']) );
	?>
</fieldset>
<fieldset>
 			<legend><?php __('Dados do Solicitante');?>
 			<?php  
 			echo $form->input('Usuario.id', array(
				'readonly' => 'readonly',
				'label' => 'Nome',
				'value' => $chamado['VwChamado']['solicitante_nome'],
				'type' => 'text',
 				'div' => 'campoBloqueado',
			));
			
			echo $form->input('solicitante_setor_nome', array(
				'readonly' => 'readonly',
				'label' => 'Setor',
				'value' => $chamado['VwChamado']['solicitante_setor_nome'],
				'type' => 'text',
				'div' => 'campoBloqueado',
			));
			?>
 		</fieldset>
 		
<fieldset>
	
	<legend> Dados do Chamado </legend>
	<?php
	
	echo $form->input('chamado_id', array (
			'value' => $chamado['VwChamado']['chamado_id'],
			'label' => 'Número: ',
			'style'=> 'width: 50px; ',
			'type' => 'text',
			'div' => 'campoBloqueado',
			'readonly' => 'readonly'
		
	));	 
	
	echo $form->input('data_hora_abertura', array(
			'type' => 'text',
			'label' => 'Data de Abertura',
			'style' => 'width: 120px;',
			'value' => $time->dataBrasileira($chamado['VwChamado']['chamado_abertura']),
			'div' => 'campoBloqueado',
			'readonly' => 'readonly'
	));
	
	echo $form->input('area', array(
			'type' => 'text',
			'value' => $chamado['VwChamado']['problema_tipo_area_nome'],
			'label' => 'Área Responsável: ',
			'style'=> 'width: 170px; ;',
			'div' => 'campoBloqueado',
			'readonly' => 'readonly'
	));	 
	
	echo $form->input('problema_id', array (
			'type' => 'text',
			'value' => $chamado['VwChamado']['problema_tipo_descricao'],
			'label' => 'Tipo de Problema:',
			'div' => 'campoBloqueado',
			'style'=> 'width: 200px;',
			'readonly' => 'readonly'
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
		echo $form->input('responsavel_id', array(
				'type' => 'text',
				'label' => 'Responsável',
				'style' => 'width: 170px;',
				//'options' => array ($status),
				'value' => $chamado['VwChamado']['chamado_responsavel_nome'],
				'div' => 'campoBloqueado',
				'readonly' => 'readonly'
				
		));
	
	
	echo $form->input('status', array (
			'type' => 'text',
			'value' => $chamado['VwChamado']['chamado_descricao_problema'],
			'label' => 'Status:',
			'div' => 'campoBloqueado',
			'readonly' => 'readonly',
			'style' => 'width: 160px;',
	));
	
	echo $form->input('descricao', array (
			'type' => 'textarea',
			'value' => $chamado['VwChamado']['chamado_descricao_problema'],
			'label' => 'Descrição do Problema:',
			'div' => 'campoBloqueado',
			'style' => 'width: 618px;',
			'readonly' => 'readonly'
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
		
		echo $form->input('descricao_solucao', array (
			'type' => 'text',
			'value' => $chamado['VwChamado']['descricao_solucao'],
			'label' => 'Descrição da Solução:',
			'div' => 'campoBloqueado',
			'style' => 'width: 600px;',
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
			//echo "<tr>";
				echo '<td style="width:30%;">Em ' . 
				$time->dataBrasileira($historico['ChamadoHistorico']['data_hora_inicial']) . " por " . $historico['Usuario']['nome'] . "</td>";
				echo "<td>" . $historico['ChamadoHistorico']['descricao']  . "</td>";
			echo "</tr>";
		}
		echo '</table>';
	}else{
		//echo '<span style="display: block; ">Nenhum Histórico foi inserido</span>';
		echo $form->input('historico', array (
			'type' => 'text',
			'value' => 'Nenhum Histórico foi inserido.',
			'label' => false,
			'div' => false,
			'style' => 'width: 618px;',
			'readonly' => 'readonly'
	));
	}
	?>
	
	</div>
	</fieldset>
	
	
</div>
