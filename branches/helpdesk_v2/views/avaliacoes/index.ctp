<div class="avaliacoes index">
<h2><?php __('Avaliacoes');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('data_hora');?></th>
	<th><?php echo $paginator->sort('nivel');?></th>
	<th><?php echo $paginator->sort('chamado_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($avaliacoes as $avaliacao):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $avaliacao['Avaliacao']['id']; ?>
		</td>
		<td>
			<?php echo $avaliacao['Avaliacao']['data_hora']; ?>
		</td>
		<td>
			<?php echo $avaliacao['Avaliacao']['nivel']; ?>
		</td>
		<td>
			<?php echo $html->link($avaliacao['Chamado']['id'], array('controller'=> 'chamados', 'action'=>'view', $avaliacao['Chamado']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $avaliacao['Avaliacao']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $avaliacao['Avaliacao']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $avaliacao['Avaliacao']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $avaliacao['Avaliacao']['id'])); ?>
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
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Avaliacao', true), array('action'=>'add')); ?></li>
	</ul>
</div>
