<div class="chamados view">
<fieldset>
	<legend> Dados do Chamado </legend>
	<?php
	
	echo $form->input('chamado_id', array (
			'value' => $chamado['Chamado']['id'],
			'label' => 'Número: ',
			'style'=> 'width: 50px; ',
			'type' => 'text',
			'div' => 'campo',
			'readonly' => 'readonly'
		
	));	 
	
	echo $form->input('data_hora_abertura', array(
			'type' => 'text',
			'label' => 'Data de Abertura',
			'style' => 'width: 120px;',
			'value' => $chamado['Chamado']['data_hora_abertura'],
			'div' => 'campo',
			'readonly' => 'readonly'
	));
	
	echo $form->input('area', array(
			'type' => 'text',
			'value' => $setor['Setor']['descricao'],
			'label' => 'Área Responsável: ',
			'style'=> 'width: 170px; ;',
			'div' => 'campo',
			'readonly' => 'readonly'
	));	 
	
	echo $form->input('problema_id', array (
			'type' => 'text',
			'value' => $chamado['Problema']['descricao'],
			'label' => 'Tipo de Problema:',
			'div' => 'campo',
			'style'=> 'width: 200px;',
			'readonly' => 'readonly'
	));
		
	echo $form->input('titulo', array(
			'label' => 'Título do Problema:',
			'value' => $chamado['Chamado']['titulo'],
			'div' => 'campo',
			'style'=> 'width: 235px;',
			'readonly' => 'readonly'
	));
	
	
	
	if ($chamado['Chamado']['status_id'] != 3){
		// diferente de aguardando atendimento
		echo $form->input('responsavel_id', array(
				'type' => 'text',
				'label' => 'Responsável',
				'style' => 'width: 170px;',
				//'options' => array ($status),
				'value' => $chamado['Responsavel']['nome'],
				'div' => 'campo',
				'readonly' => 'readonly'
				
		));
	}
	
	echo $form->input('status', array (
			'type' => 'text',
			'value' => $chamado['Status']['descricao'],
			'label' => 'Status:',
			'div' => 'campo',
			'readonly' => 'readonly',
			'style' => 'width: 160px;',
	));
	
	echo $form->input('descricao', array (
			'type' => 'textarea',
			'value' => $chamado['Chamado']['descricao_problema'],
			'label' => 'Descrição do Problema:',
			'div' => 'campo',
			'style' => 'width: 618px;',
			'readonly' => 'readonly'
	));
	
	if ($chamado['Chamado']['status_id'] == 4){
		// igual a encerrada
		echo $form->input('data_hora_encerramento', array(
			'type' => 'text',
			'label' => 'Data de Encerramento',
			'style' => 'width: 195px;',
			'value' => $chamado['Chamado']['data_hora_encerramento'],
			'div' => 'campo',
			'readonly' => 'readonly'
		));
		
		echo $form->input('descricao_solucao', array (
			'type' => 'text',
			'value' => $chamado['Chamado']['descricao_solucao'],
			'label' => 'Descrição da Solução:',
			'div' => 'campo',
			'style' => 'width: 600px;',
		));
		
	} 
	

	 //p/r($historicos);
	 
	?>
	
	
		<div class="campo" >
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
				echo '<td style="width:30%;">Em ' . $historico['ChamadoHistorico']['data_hora_inicial'] . " por " . $historico['Usuario']['nome'] . "</td>";
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
	));
	}
	?>
	
	</div>
	</fieldset>
	<fieldset style="text-align: left;">
	
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
