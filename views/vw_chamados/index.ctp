<div class="vwChamados index">
<h2><?php __('VwChamados');?></h2>
<p><?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $paginator->sort('id');?></th>
		<th><?php echo $paginator->sort('prioridade');?></th>
		<th><?php echo $paginator->sort('tempo');?></th>
		<th><?php echo $paginator->sort('setor');?></th>
		<th><?php echo $paginator->sort('problema');?></th>
		<th><?php echo $paginator->sort('titulo');?></th>
		<th><?php echo $paginator->sort('responsvel');?></th>
		<th><?php echo $paginator->sort('solicitante');?></th>
		<th><?php echo $paginator->sort('data_hora_abertura');?></th>
		<th><?php echo $paginator->sort('data_hora_limite');?></th>
		<th><?php echo $paginator->sort('descricao');?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($vwChamados as $vwChamado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	?>
	<tr <?php echo $class;?>>
		<td><?php echo $vwChamado['VwChamado']['id']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['prioridade']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['tempo']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['setor']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['problema']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['titulo']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['responsvel']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['solicitante']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['data_hora_abertura']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['data_hora_limite']; ?></td>
		<td><?php echo $vwChamado['VwChamado']['descricao']; ?></td>
		<td class="actions"><?php echo $html->link(__('View', true), array('action'=>'view', $vwChamado['VwChamado']['id'])); ?>
		<?php echo $html->link(__('Edit', true), array('action'=>'edit', $vwChamado['VwChamado']['id'])); ?>
		<?php echo $html->link(__('Delete', true), array('action'=>'delete', $vwChamado['VwChamado']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $vwChamado['VwChamado']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
</div>
<div class="paging"><?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
| <?php echo $paginator->numbers();?> <?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('New VwChamado', true), array('action'=>'add')); ?></li>
</ul>
</div>
