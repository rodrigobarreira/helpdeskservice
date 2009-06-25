<?php //pr($chamados)?>
<fieldset style="width: 100%; padding-left: 0px"><legend>Filtros</legend>
</fieldset>

<div class="chamados">
<table cellpadding="0" cellspacing="0">
<?php
$quantidade = null;
$paginator->options(
array('update'=>'chamadosAbertos',
    	'url'=>array('controller'=>'chamados', 'action'=>'meusChamadosAbertos', $quantidade), 
        'indicator' => 'loadAjax',
		'limit' => 10
));


?>
	<tr>
		<th style="width: 3%;"><?php echo $paginator->sort('Nº', 'id');?></th>
		<th style="width: 18%;"><?php echo $paginator->sort('Área', 'Problema.Setor.descricao');?></th>
		<th style="width: 18%;"><?php echo $paginator->sort('Tipo de Problema', 'Problema.descricao');?></th>
		<th style="width: 18%;"><?php echo $paginator->sort('Título', 'titulo');?></th>
		<th style="width: 14%;"><?php echo $paginator->sort('Data / Hora Abertura', 'data_hora_abertura');?></th>
		<th style="width: 13%;"><?php echo $paginator->sort('Status', 'status_descricao');?></th>
		<th style="width: 8%;"><?php echo $paginator->sort('Responsável', 'responsavel_id');?></th>
		<th style="width: 8%;"><?php echo 'Ação';?></th>
	</tr>
	<?php
	pr($chamados);
	$i = 0;
	foreach ($chamados as $chamado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	?>
	<tr <?php echo $class;?>>
		<td><?php echo $html->link($chamado['Chamado']['id'], array('controller'=>'home', 'action' => 'visualizarChamado', $chamado['Chamado']['id'])); ?>

		</td>
		<td><?php echo $chamado['Problema']['Setor']['descricao']; ?></td>
		<td><?php echo $chamado['Problema']['descricao']; ?></td>
		<td><?php echo $chamado['Chamado']['titulo']; ?></td>
		<td><?php
		//echo $chamado['Chamado']['data_hora_abertura'];
		$data_abertura = date_parse($chamado['VwChamado']['data_hora_abertura'] );
		echo $data_abertura['day']."-".$data_abertura['month']."-".$data_abertura['year'] ;
		echo "<br>";
		echo $data_abertura['hour'].":".$data_abertura['minute'].":".$data_abertura['second'] ;
		?></td>
		<td><?php echo $chamado['Status']['descricao']; ?></td>
		<td><?php echo $chamado['Responsavel']['nome']; ?></td>
		<td><?php echo $html->link('Visualizar', array('controller'=>'home', 'action' => 'visualizarChamado', $chamado['Chamado']['id'])); ?>
		</td>

	</tr>

	<?php endforeach; ?>
</table>
</div>
<div class="paging"><?php echo $paginator->prev($html->image('bt_anterior.jpg'), array('escape' => false), $html->image('bt_anterior_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
| <?php echo $paginator->numbers();?> <?php echo $paginator->next($html->image('bt_proximo.jpg'), array('escape' => false), $html->image('bt_proximo_off.jpg'), array('class'=>'disabled', 'escape' => false));?>

</div>
