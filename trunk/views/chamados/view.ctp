<div class="chamados view">

<fieldset>
	<?php
	
	echo $form->input('chamado_id', array(
			'type' => 'text',
			'value' => $chamado['Chamado']['id'],
			'label' => 'Chamado: '
	));	 
	
	echo $form->input('area', array(
			'type' => 'text',
			'value' => $setor['Setor']['descricao'],
			'label' => 'Área Responsável: '
	));	 
	
	echo $form->input('problema_id', array (
			'type' => 'text',
			'value' => $chamado['Problema']['descricao'],
			'label' => 'Tipo de Problema:',
	));
		
	echo $form->input('titulo', array(
			'label' => 'Título do Problema:',
			'value' => $chamado['Chamado']['titulo']
	));

	echo $form->input('descricao', array (
			'type' => 'text',
			'value' => $chamado['Chamado']['descricao_problema'],
			'label' => 'Descrição do Problema:',
	));
		
	
	echo $form->input('data_hora_abertura', array(
			'type' => 'text',
			'label' => 'Data de Abertura',
			'style' => 'width: 250px;',
			'value' => $chamado['Chamado']['data_hora_abertura'],
	));
	
	if ($chamado['Chamado']['status_id'] != 3){
		// diferente de aguardando atendimento
		echo $form->input('responsavel_id', array(
				'type' => 'text',
				'label' => 'Responsável',
				'style' => 'width: 250px;',
				//'options' => array ($status),
				'value' => $chamado['Responsavel']['nome'],
				
		));
	}
	if ($chamado['Chamado']['status_id'] == 4){
		// igual a encerrada
		echo $form->input('data_hora_encerramento', array(
			'type' => 'text',
			'label' => 'Data de Encerramento',
			'style' => 'width: 250px;',
			'value' => $chamado['Chamado']['data_hora_encerramento'],
		));
		
		echo $form->input('descricao_solucao', array (
			'type' => 'text',
			'value' => $chamado['Chamado']['descricao_solucao'],
			'label' => 'Descrição da Solução:',
		));
		
	}
	
	echo $form->input('status', array (
			'type' => 'text',
			'value' => $chamado['Status']['descricao'],
			'label' => 'Status:',
	));
	

	 //pr($historicos);
	if (count($historicos) > 0){
		//$historicos = $chamado['ChamadoHistorico'];
		echo "<h4>Histórico do Chamado</h4>";
		echo "<table>";
			foreach($historicos as $historico){
			echo "<tr>";
				echo "<td>Em " . $historico['ChamadoHistorico']['data_hora_incial'] . " por " . $historico['Usuario']['nome'] . "</td>";
				echo "<td>" . $historico['ChamadoHistorico']['descricao']  . "</td>";
			echo "</tr>";
		}
		
		echo "</table>";
		
	}
	
	?>
	</fieldset>
</div>
