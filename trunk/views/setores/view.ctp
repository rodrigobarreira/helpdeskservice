<div class="setores view">
<h2><?php  __('Setor');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $setor['Setor']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $setor['Setor']['descricao']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sla'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($setor['Sla']['id'], array('controller'=> 'slas', 'action'=>'view', $setor['Sla']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Atende Chamado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $setor['Setor']['atende_chamado']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Setor', true), array('action'=>'edit', $setor['Setor']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Setor', true), array('action'=>'delete', $setor['Setor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $setor['Setor']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Setores', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Setor', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Slas', true), array('controller'=> 'slas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Sla', true), array('controller'=> 'slas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Usuarios', true), array('controller'=> 'usuarios', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Usuario', true), array('controller'=> 'usuarios', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Problemas');?></h3>
	<?php if (!empty($setor['Problema'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th><?php __('Sla Id'); ?></th>
		<th><?php __('Setor Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($setor['Problema'] as $problema):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $problema['id'];?></td>
			<td><?php echo $problema['descricao'];?></td>
			<td><?php echo $problema['sla_id'];?></td>
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
<div class="related">
	<h3><?php __('Related Usuarios');?></h3>
	<?php if (!empty($setor['Usuario'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Grupo Id'); ?></th>
		<th><?php __('Setor Id'); ?></th>
		<th><?php __('Matricula'); ?></th>
		<th><?php __('Nome'); ?></th>
		<th><?php __('Senha'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Celular'); ?></th>
		<th><?php __('Telefone'); ?></th>
		<th><?php __('Ramal'); ?></th>
		<th><?php __('Ativo'); ?></th>
		<th><?php __('Data Cadastro'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($setor['Usuario'] as $usuario):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $usuario['id'];?></td>
			<td><?php echo $usuario['grupo_id'];?></td>
			<td><?php echo $usuario['setor_id'];?></td>
			<td><?php echo $usuario['matricula'];?></td>
			<td><?php echo $usuario['nome'];?></td>
			<td><?php echo $usuario['senha'];?></td>
			<td><?php echo $usuario['email'];?></td>
			<td><?php echo $usuario['celular'];?></td>
			<td><?php echo $usuario['telefone'];?></td>
			<td><?php echo $usuario['ramal'];?></td>
			<td><?php echo $usuario['ativo'];?></td>
			<td><?php echo $usuario['data_cadastro'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'usuarios', 'action'=>'view', $usuario['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'usuarios', 'action'=>'edit', $usuario['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'usuarios', 'action'=>'delete', $usuario['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $usuario['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Usuario', true), array('controller'=> 'usuarios', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
