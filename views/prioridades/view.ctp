<div class="prioridades view">
<h2><?php  __('Prioridade');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prioridade['Prioridade']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tempo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prioridade['Prioridade']['tempo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prioridade['Prioridade']['descricao']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Prioridade', true), array('action'=>'edit', $prioridade['Prioridade']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Prioridade', true), array('action'=>'delete', $prioridade['Prioridade']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $prioridade['Prioridade']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Prioridades', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Prioridade', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Problemas');?></h3>
	<?php if (!empty($prioridade['Problema'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th><?php __('Prioridade Id'); ?></th>
		<th><?php __('Setor Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($prioridade['Problema'] as $problema):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $problema['id'];?></td>
			<td><?php echo $problema['descricao'];?></td>
			<td><?php echo $problema['prioridade_id'];?></td>
			<td><?php echo $problema['setor_id'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'problemas', 'action'=>'view', $problema['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'problemas', 'action'=>'edit', $problema['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'problemas', 'action'=>'delete', $problema['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $problema['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
