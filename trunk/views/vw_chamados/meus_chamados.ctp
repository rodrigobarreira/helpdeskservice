

<fieldset  style="width: 100%; padding-left: 0px">
<legend>Filtros</legend>
</fieldset>

<div id="meusChamados" class="chamados">
<table cellpadding="0" cellspacing="0">
<?php  
$quantidade = null;
$paginator->options(
	array(
    	'url'=>array('controller'=>'home', 'action'=>'meusChamados', $quantidade), 
        'indicator' => 'loadAjax',
));

?> 
<tr>
	<th style="width:3%;"><?php echo $paginator->sort('Nº', 'chamado_id');?></th>
	<th style="width:18%;"><?php echo $paginator->sort('Área', 'problema_tipo_area_nome');?></th>
	<th style="width:18%;"><?php echo $paginator->sort('Tipo de Problema', 'problema_tipo_descricao');?></th>
	<th style="width:18%;"><?php echo $paginator->sort('Prioridade', 'chamado_prioridade_descricao');?></th>
	<th style="width:18%;"><?php echo $paginator->sort('Título', 'chamado_titulo');?></th>
	<th style="width:14%;"><?php echo $paginator->sort('Data Abertura', 'chamado_abertura');?></th>
	<th style="width:13%;"><?php echo $paginator->sort('Status', 'chamado_status_descricao');?></th>
	<th style="width:8%;"><?php echo $paginator->sort('Responsável', 'chamado_responsavel_nome');?></th>
	<th style="width:8%;"><?php echo 'Ação';?></th>
</tr>
<?php
//pr($vw_chamados);
$i = 0;
foreach ($vw_chamados as $chamado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr  <?php echo $class;?> >
		<td	>
		<?php echo $html->link($chamado['VwChamado']['chamado_id'], array('controller'=>'home', 'action' => 'visualizarChamado', $chamado['VwChamado']['chamado_id'])); ?>

		</td>
		<td>
			<?php echo $chamado['VwChamado']['problema_tipo_area_nome']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['problema_tipo_descricao']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['chamado_prioridade_descricao']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['chamado_titulo']; ?>
		</td>
		<td>
			<?php
			$data = $time->dataBrasileira($chamado['VwChamado']['chamado_abertura']);
			echo substr($data, 0, 10). "<br />". substr($data, 11); 
			?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['chamado_status_descricao']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['chamado_responsavel_nome']; ?>
		</td>
		<td	>
		<?php echo $html->link('Visualizar', array('controller'=>'home', 'action' => 'visualizarChamado', $chamado['VwChamado']['chamado_id'])); ?>
		</td>
		
	</tr>
	
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev($html->image('bt_anterior.jpg'), array('escape' => false), $html->image('bt_anterior_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
  	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next($html->image('bt_proximo.jpg'), array('escape' => false), $html->image('bt_proximo_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
	
</div>

