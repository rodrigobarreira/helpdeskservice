<div class="problemas view">
<h2><?php  __('Problema');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $problema['Problema']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $problema['Problema']['descricao']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sla'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($problema['Sla']['id'], array('controller'=> 'slas', 'action'=>'view', $problema['Sla']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Setor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($problema['Setor']['id'], array('controller'=> 'setores', 'action'=>'view', $problema['Setor']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Problema', true), array('action'=>'edit', $problema['Problema']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Problema', true), array('action'=>'delete', $problema['Problema']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $problema['Problema']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Problemas', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Problema', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Slas', true), array('controller'=> 'slas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Sla', true), array('controller'=> 'slas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Setores', true), array('controller'=> 'setores', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Setor', true), array('controller'=> 'setores', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Chamados');?></h3>
	<?php if (!empty($problema['Chamado'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Problema Id'); ?></th>
		<th><?php __('Usuario Id'); ?></th>
		<th><?php __('Data Hora Abertura'); ?></th>
		<th><?php __('Aberto Por'); ?></th>
		<th><?php __('Descricao Problema'); ?></th>
		<th><?php __('Descricao Solucao'); ?></th>
		<th><?php __('Data Hora Atendimento'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Data Hora Encerramento'); ?></th>
		<th><?php __('Responsavel Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($problema['Chamado'] as $chamado):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $chamado['id'];?></td>
			<td><?php echo $chamado['problema_id'];?></td>
			<td><?php echo $chamado['usuario_id'];?></td>
			<td><?php echo $chamado['data_hora_abertura'];?></td>
			<td><?php echo $chamado['aberto_por'];?></td>
			<td><?php echo $chamado['descricao_problema'];?></td>
			<td><?php echo $chamado['descricao_solucao'];?></td>
			<td><?php echo $chamado['data_hora_atendimento'];?></td>
			<td><?php echo $chamado['status_id'];?></td>
			<td><?php echo $chamado['data_hora_encerramento'];?></td>
			<td><?php echo $chamado['responsavel_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'chamados', 'action'=>'view', $chamado['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'chamados', 'action'=>'edit', $chamado['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'chamados', 'action'=>'delete', $chamado['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chamado['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
