<div class="chamadoHistoricos index">
<h2><?php __('ChamadoHistoricos');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('data');?></th>
	<th><?php echo $paginator->sort('hora');?></th>
	<th><?php echo $paginator->sort('chamado_id');?></th>
	<th><?php echo $paginator->sort('usuario_id');?></th>
	<th><?php echo $paginator->sort('descricao');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($chamadoHistoricos as $chamadoHistorico):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $chamadoHistorico['ChamadoHistorico']['id']; ?>
		</td>
		<td>
			<?php echo $chamadoHistorico['ChamadoHistorico']['data']; ?>
		</td>
		<td>
			<?php echo $chamadoHistorico['ChamadoHistorico']['hora']; ?>
		</td>
		<td>
			<?php echo $chamadoHistorico['ChamadoHistorico']['chamado_id']; ?>
		</td>
		<td>
			<?php echo $html->link($chamadoHistorico['Usuario']['id'], array('controller'=> 'usuarios', 'action'=>'view', $chamadoHistorico['Usuario']['id'])); ?>
		</td>
		<td>
			<?php echo $chamadoHistorico['ChamadoHistorico']['descricao']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $chamadoHistorico['ChamadoHistorico']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $chamadoHistorico['ChamadoHistorico']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $chamadoHistorico['ChamadoHistorico']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chamadoHistorico['ChamadoHistorico']['id'])); ?>
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
