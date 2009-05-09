<?php //pr($chamados)?>
<div class="chamados index">
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('Área');?></th>
	<th><?php echo $paginator->sort('Tipo de Problema');?></th>
	<th><?php echo $paginator->sort('Data / Hora Abertura');?></th>
	<th><?php echo $paginator->sort('Status');?></th>
	<th><?php echo $paginator->sort('Responsável');?></th>
	<th class="actions"><?php __('Ação');?></th>
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
			<?php echo $chamado['Chamado']['id']; ?>
		</td>
		<td>
			<?php echo $chamado['Problema']['Setor']['descricao']; ?>
		</td>
		<td>
			<?php echo $chamado['Problema']['descricao']; ?>
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
		<td class="actions">
			<?php echo $html->link(__('Visualizar', true), array('action'=>'view', $chamado['Chamado']['id'])); ?>
			<?php echo $html->link(__('', true), array('action'=>'edit', $chamado['Chamado']['id'])); ?>
		</td>
	</tr>
	<tr <?php echo $class;?>>
		<td>
		
		</td >
		<td colspan="6" style="text-align:left; border-top: #ccc solid 1px; font-size: 90%;">
			<?php echo $chamado['Chamado']['descricao_problema']; ?>
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
