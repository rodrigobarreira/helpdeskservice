<div class="chamados view"><?php 
if ($usuarioGrupo != 1){
	// diferede de solicitante
	?> <?php echo $html->link(__('Alterar', true), array('controller'=> 'atendimento', 'action'=>'alterarChamado', $chamado['Chamado']['id']) );?>
| <?php echo $html->link(__('Atender Chamado', true), array('controller'=> 'atendimento', 'action'=>'atenderChamado', $chamado['Chamado']['id']) );?>
	<?php
}
?>
<fieldset>
<div class="coluna_esq"><?php

echo $form->input('chamado_id', array(
			'type' => 'text',
			'value' => $chamado['Chamado']['id'],
			'label' => 'Chamado: ',
			'class'=> 'teste' 
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


			?></div>

<div class="coluna_dir"><?php



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


//p/r($historicos);

?></div>

<div class="coluna_line"><?php
echo $form->input('descricao', array (
			'type' => 'text',
			'value' => $chamado['Chamado']['descricao_problema'],
			'label' => 'Descrição do Problema:',
));


if (count($historicos) > 0){
	//$historicos = $chamado['ChamadoHistorico'];
	echo "<label>Histórico do Chamado</label>";

	echo "<table>";
	foreach($historicos as $historico){
		echo "<tr>";
		echo '<td style="width:30%;">Em ' . $historico['ChamadoHistorico']['data_hora_inicial'] . " por " . $historico['Usuario']['nome'] . "</td>";
		echo "<td>" . $historico['ChamadoHistorico']['descricao']  . "</td>";
		echo "</tr>";
	}

	echo "</table>";

}

?></div>
</fieldset>
</div>
