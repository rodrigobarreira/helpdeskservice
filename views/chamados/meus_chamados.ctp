<?php //pr($chamados)?>
<div class="chamados index">
<table cellpadding="0" cellspacing="0">
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
		<?php echo $html->link($chamado['Chamado']['id'], array('action'=>'view', $chamado['Chamado']['id'])); ?>

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
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
