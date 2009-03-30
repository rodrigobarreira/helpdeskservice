<div class="prioridades index">
<h2><?php __('Prioridades');?></h2>
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
	<th><?php echo $paginator->sort('tempo_maximo');?></th>
	<th><?php echo $paginator->sort('unidade_tempo');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($prioridades as $prioridade):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $prioridade['Prioridade']['id']; ?>
		</td>
		<td>
			<?php echo $prioridade['Prioridade']['descricao']; ?>
		</td>
		<td>
			<?php echo $prioridade['Prioridade']['tempo_maximo']; ?>
		</td>
		<td>
			<?php echo $prioridade['Prioridade']['unidade_tempo']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $prioridade['Prioridade']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $prioridade['Prioridade']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $prioridade['Prioridade']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prioridade['Prioridade']['id'])); ?>
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
		<li><?php echo $html->link(__('New Prioridade', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
	</ul>
</div>
