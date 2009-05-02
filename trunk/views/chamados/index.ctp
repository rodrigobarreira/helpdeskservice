<div class="chamados index">
<h2><?php __('Chamados');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('problema_id');?></th>
	<th><?php echo $paginator->sort('usuario_id');?></th>
	<th><?php echo $paginator->sort('data_hora_abertura');?></th>
	<th><?php echo $paginator->sort('aberto_por');?></th>
	<th><?php echo $paginator->sort('descricao_problema');?></th>
	<th><?php echo $paginator->sort('descricao_solucao');?></th>
	<th><?php echo $paginator->sort('data_hora_atendimento');?></th>
	<th><?php echo $paginator->sort('status_id');?></th>
	<th><?php echo $paginator->sort('data_hora_encerramento');?></th>
	<th><?php echo $paginator->sort('responsavel_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($chamados as $chamado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $chamado['Chamado']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($chamado['Problema']['id'], array('controller'=> 'problemas', 'action'=>'view', $chamado['Problema']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($chamado['Usuario']['id'], array('controller'=> 'usuarios', 'action'=>'view', $chamado['Usuario']['id'])); ?>
		</td>
		<td>
			<?php echo $chamado['Chamado']['data_hora_abertura']; ?>
		</td>
		<td>
			<?php echo $chamado['Chamado']['aberto_por']; ?>
		</td>
		<td>
			<?php echo $chamado['Chamado']['descricao_problema']; ?>
		</td>
		<td>
			<?php echo $chamado['Chamado']['descricao_solucao']; ?>
		</td>
		<td>
			<?php echo $chamado['Chamado']['data_hora_atendimento']; ?>
		</td>
		<td>
			<?php echo $html->link($chamado['Status']['id'], array('controller'=> 'status', 'action'=>'view', $chamado['Status']['id'])); ?>
		</td>
		<td>
			<?php echo $chamado['Chamado']['data_hora_encerramento']; ?>
		</td>
		<td>
			<?php echo $html->link($chamado['Responsavel']['id'], array('controller'=> 'usuarios', 'action'=>'view', $chamado['Responsavel']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $chamado['Chamado']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $chamado['Chamado']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $chamado['Chamado']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chamado['Chamado']['id'])); ?>
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
		<li><?php echo $html->link(__('New Chamado', true), array('action'=>'add')); ?></li>
	</ul>
</div>
