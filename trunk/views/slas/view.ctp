<div class="slas view">
<h2><?php  __('Sla');?></h2>
<dl>
<?php $i = 0; $class = ' class="altrow"';?>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $sla['Sla']['id']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Tempo'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $sla['Sla']['tempo']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $sla['Sla']['descricao']; ?>
	&nbsp;</dd>
</dl>
</div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('Edit Sla', true), array('action'=>'edit', $sla['Sla']['id'])); ?>
	</li>
	<li><?php echo $html->link(__('Delete Sla', true), array('action'=>'delete', $sla['Sla']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sla['Sla']['id'])); ?>
	</li>
	<li><?php echo $html->link(__('List Slas', true), array('action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Sla', true), array('action'=>'add')); ?>
	</li>
	<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?>
	</li>
	<li><?php echo $html->link(__('List Setores', true), array('controller'=> 'setores', 'action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Setor', true), array('controller'=> 'setores', 'action'=>'add')); ?>
	</li>
</ul>
</div>
<div class="related">
<h3><?php __('Related Problemas');?></h3>
<?php if (!empty($sla['Problema'])):?>
<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th><?php __('Sla Id'); ?></th>
		<th><?php __('Setor Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sla['Problema'] as $problema):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	?>
	<tr <?php echo $class;?>>
		<td><?php echo $problema['id'];?></td>
		<td><?php echo $problema['descricao'];?></td>
		<td><?php echo $problema['sla_id'];?></td>
		<td><?php echo $problema['setor_id'];?></td>
		<td class="actions"><?php echo $html->link(__('View', true), array('controller'=> 'problemas', 'action'=>'view', $problema['id'])); ?>
		<?php echo $html->link(__('Edit', true), array('controller'=> 'problemas', 'action'=>'edit', $problema['id'])); ?>
		<?php echo $html->link(__('Delete', true), array('controller'=> 'problemas', 'action'=>'delete', $problema['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $problema['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
	<?php endif; ?>

<div class="actions">
<ul>
	<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add'));?>
	</li>
</ul>
</div>
</div>
<div class="related">
<h3><?php __('Related Setores');?></h3>
	<?php if (!empty($sla['Setor'])):?>
<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th><?php __('Sla Id'); ?></th>
		<th><?php __('Atende Chamado'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sla['Setor'] as $setor):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	?>
	<tr <?php echo $class;?>>
		<td><?php echo $setor['id'];?></td>
		<td><?php echo $setor['descricao'];?></td>
		<td><?php echo $setor['sla_id'];?></td>
		<td><?php echo $setor['atende_chamado'];?></td>
		<td class="actions"><?php echo $html->link(__('View', true), array('controller'=> 'setores', 'action'=>'view', $setor['id'])); ?>
		<?php echo $html->link(__('Edit', true), array('controller'=> 'setores', 'action'=>'edit', $setor['id'])); ?>
		<?php echo $html->link(__('Delete', true), array('controller'=> 'setores', 'action'=>'delete', $setor['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $setor['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
	<?php endif; ?>

<div class="actions">
<ul>
	<li><?php echo $html->link(__('New Setor', true), array('controller'=> 'setores', 'action'=>'add'));?>
	</li>
</ul>
</div>
</div>
