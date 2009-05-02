<div class="problemas index">
<h2><?php __('Problemas');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('descricao');?></th>
	<th><?php echo $paginator->sort('sla_id');?></th>
	<th><?php echo $paginator->sort('setor_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($problemas as $problema):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $problema['Problema']['id']; ?>
		</td>
		<td>
			<?php echo $problema['Problema']['descricao']; ?>
		</td>
		<td>
			<?php echo $html->link($problema['Sla']['id'], array('controller'=> 'slas', 'action'=>'view', $problema['Sla']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($problema['Setor']['id'], array('controller'=> 'setores', 'action'=>'view', $problema['Setor']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $problema['Problema']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $problema['Problema']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $problema['Problema']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $problema['Problema']['id'])); ?>
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
		<li><?php echo $html->link(__('New Problema', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Slas', true), array('controller'=> 'slas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Sla', true), array('controller'=> 'slas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Setores', true), array('controller'=> 'setores', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Setor', true), array('controller'=> 'setores', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
	</ul>
</div>
