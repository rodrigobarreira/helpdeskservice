<div class="subProblemas view">
<h2><?php  __('SubProblema');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subProblema['SubProblema']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Problema'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($subProblema['Problema']['id'], array('controller'=> 'problemas', 'action'=>'view', $subProblema['Problema']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $subProblema['SubProblema']['descricao']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit SubProblema', true), array('action'=>'edit', $subProblema['SubProblema']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete SubProblema', true), array('action'=>'delete', $subProblema['SubProblema']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subProblema['SubProblema']['id'])); ?> </li>
		<li><?php echo $html->link(__('List SubProblemas', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New SubProblema', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Chamados');?></h3>
	<?php if (!empty($subProblema['Chamado'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Sub Problema Id'); ?></th>
		<th><?php __('Data Abertura'); ?></th>
		<th><?php __('Usuario Id'); ?></th>
		<th><?php __('Hora Abertura'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th><?php __('Prioridade Id'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Data Limite'); ?></th>
		<th><?php __('Hora Limite'); ?></th>
		<th><?php __('Data Fechamento'); ?></th>
		<th><?php __('Hora Fechamento'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($subProblema['Chamado'] as $chamado):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $chamado['id'];?></td>
			<td><?php echo $chamado['sub_problema_id'];?></td>
			<td><?php echo $chamado['data_abertura'];?></td>
			<td><?php echo $chamado['usuario_id'];?></td>
			<td><?php echo $chamado['hora_abertura'];?></td>
			<td><?php echo $chamado['descricao'];?></td>
			<td><?php echo $chamado['prioridade_id'];?></td>
			<td><?php echo $chamado['status_id'];?></td>
			<td><?php echo $chamado['data_limite'];?></td>
			<td><?php echo $chamado['hora_limite'];?></td>
			<td><?php echo $chamado['data_fechamento'];?></td>
			<td><?php echo $chamado['hora_fechamento'];?></td>
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
