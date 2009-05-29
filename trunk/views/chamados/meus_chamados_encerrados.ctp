<?php //pr($chamados)?>
<h5 style="font-weight: normal;">Chamados Encerrados.</h5>
<div class="chamados">
<table cellpadding="0" cellspacing="0">
<?php  
$paginator->options(
	array('update'=>'chamadosAbertos', 
    	'url'=>array('controller'=>'chamados', 'action'=>'meusChamadosAbertos'), 
        'indicator' => 'loadAjax'
));
?> 
<tr>
	<th><?php echo $paginator->sort('Nº', 'id');?></th>
	<th><?php echo $paginator->sort('Área', 'area_id');?></th>
	<th><?php echo $paginator->sort('Tipo de Problema', 'Problema.descricao');?></th>
	<th><?php echo $paginator->sort('Título', 'titulo');?></th>
	<th><?php echo $paginator->sort('Data / Hora Abertura', 'data_hora_abertura');?></th>
	<th><?php echo $paginator->sort('Status', 'status_descricao');?></th>
	<th><?php echo $paginator->sort('Responsável', 'responsavel_id');?></th>
</tr>
<?php
$i = 0;
foreach ($chamados as $chamado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr  <?php echo $class;?> >
		<td	>
		<?php echo $html->link($chamado['Chamado']['id'], array('../visualizarChamado', $chamado['Chamado']['id'])); ?>

		</td>
		<td>
			<?php echo $chamado['Problema']['Setor']['descricao']; ?>
		</td>
		<td>
			<?php echo $chamado['Problema']['descricao']; ?>
		</td>
		<td>
			<?php echo $chamado['Chamado']['titulo']; ?>
		</td>
		<td>
			<?php echo $chamado['Chamado']['data_hora_abertura']; ?>
		</td>
		<td>
			<?php echo $chamado['Status']['descricao']; ?>
		</td>
		<td>
			<?php echo $chamado['Responsavel']['nome']; ?>
		</td>
	</tr>
	
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev($html->image('bt_anterior.jpg'), array('escape' => false), $html->image('bt_anterior_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next($html->image('bt_proximo.jpg'), array('escape' => false), $html->image('bt_proximo_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
</div>