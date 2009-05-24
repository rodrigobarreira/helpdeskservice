<?php //TODO verifica a recursividade dos chamados($chamados)
//pr($chamados);
?>
<div class="chamados index" style="background-color: ">
<table cellpadding="0" cellspacing="0">
<tr>
	
	<th colspan="2"><?php echo $paginator->sort('Nº', 'id');?></th>
	<th><?php echo $paginator->sort('Prioridade', 'prioridade');?></th>
	<th><?php echo $paginator->sort('Área', 'area');?></th>
	<th><?php echo $paginator->sort('Tipo de Problema', 'problema');?></th>
	<th><?php echo $paginator->sort('Título', 'titulo');?></th>
	<th><?php echo $paginator->sort('Solicitante', 'solicitante');?></th>
	<th><?php echo $paginator->sort('Data Abertura', 'data_hora_abertura');?></th>
	<th><?php echo $paginator->sort('Data Limite', 'data_hora_limite');?></th>
	<th><?php echo $paginator->sort('Responsável', 'responsavel');?></th>
	<th><?php echo $paginator->sort('Status', 'status');?></th>
	
</tr>
<?php
$i = 0;

foreach ($chamados as $chamado){
	$style = null; 
	$aux = explode(":", $chamado['VwChamado']['tempo_decorrido']);
	/*
	if (empty($aux[0])){
		$aux = array(0);
	}
	pr ($aux);
*/
	$minutos_decorridos = $aux[0] * 60;
	if ($minutos_decorridos < 0){
		$minutos_decorridos -= $aux[1];
	}else{
		$minutos_decorridos += $aux[1];
	}
	
	$tempo_decorrido_em_porcentagem =  ($minutos_decorridos / $chamado['VwChamado']['tempo']) * 100;
	//$tempo_decorrido_em_porcentagem *= -1;
		
	if ($tempo_decorrido_em_porcentagem <= 0){
		$style = 'style="background-color: red"';	
	}elseif ($tempo_decorrido_em_porcentagem > 70 && $tempo_decorrido_em_porcentagem < 100){
		$style = 'style="background-color: yellow"';   
	}else{
		//passou do horário limite 
		$style = 'style="background-color: red; width: 5px;"';
	}

	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}

	?>
	<tr  <?php echo $class;?> >
		<td <?php echo $style?>>
		
		</td>
		<td	>
			<?php echo $html->link($chamado['VwChamado']['id'], array('controller' => 'atendimento', 'action'=>'visualizarChamado', $chamado['VwChamado']['id'])); 
			
			
			?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['prioridade']; ?>
		</td>
		<td>
			<?php
			//<gambiarra> 
			if (isset($chamado['VwChamado']['area'])){
				echo $chamado['VwChamado']['area']; 
			}elseif(isset($chamado['str']['area'])){
				echo $chamado['str']['area']; 
				
			}
			//</gambiarra>
			?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['problema']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['titulo']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['solicitante']; ?>
		</td>
		<td>
			<?php
			$data_abertura = date_parse($chamado['VwChamado']['data_hora_abertura'] );
			echo $data_abertura['day']."-".$data_abertura['month']."-".$data_abertura['year'] ;
			 echo "<br>";
			 echo $data_abertura['hour'].":".$data_abertura['minute'].":".$data_abertura['second'] ;
			//echo date_format($chamado['VwChamado']['data_hora_abertura'], "H-i-s");
			?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['data_hora_limite']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['responsavel']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['status']; ?>
		</td>
	</tr>
	
<?php } ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>

