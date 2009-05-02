<div class="slas index">
<h2><?php __('Slas');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('tempo');?></th>
	<th><?php echo $paginator->sort('descricao');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($slas as $sla):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $sla['Sla']['id']; ?>
		</td>
		<td>
			<?php echo $sla['Sla']['tempo']; ?>
		</td>
		<td>
			<?php echo $sla['Sla']['descricao']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $sla['Sla']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $sla['Sla']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $sla['Sla']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sla['Sla']['id'])); ?>
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
		<li><?php echo $html->link(__('New Sla', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Setores', true), array('controller'=> 'setores', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Setor', true), array('controller'=> 'setores', 'action'=>'add')); ?> </li>
	</ul>
</div>
