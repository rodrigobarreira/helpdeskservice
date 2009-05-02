<div class="usuarios view">
<h2><?php  __('Usuario');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usuario['Usuario']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Grupo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($usuario['Grupo']['id'], array('controller'=> 'grupos', 'action'=>'view', $usuario['Grupo']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Setor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($usuario['Setor']['id'], array('controller'=> 'setores', 'action'=>'view', $usuario['Setor']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Matricula'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usuario['Usuario']['matricula']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usuario['Usuario']['nome']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Senha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usuario['Usuario']['senha']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usuario['Usuario']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Celular'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usuario['Usuario']['celular']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usuario['Usuario']['telefone']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ramal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $usuario['Usuario']['ramal']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php __('Related Chamado Historicos');?></h3>
	<?php if (!empty($usuario['ChamadoHistorico'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Data'); ?></th>
		<th><?php __('Hora'); ?></th>
		<th><?php __('Chamado Id'); ?></th>
		<th><?php __('Usuario Id'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usuario['ChamadoHistorico'] as $chamadoHistorico):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $chamadoHistorico['id'];?></td>
			<td><?php echo $chamadoHistorico['data'];?></td>
			<td><?php echo $chamadoHistorico['hora'];?></td>
			<td><?php echo $chamadoHistorico['chamado_id'];?></td>
			<td><?php echo $chamadoHistorico['usuario_id'];?></td>
			<td><?php echo $chamadoHistorico['descricao'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'chamado_historicos', 'action'=>'view', $chamadoHistorico['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'chamado_historicos', 'action'=>'edit', $chamadoHistorico['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'chamado_historicos', 'action'=>'delete', $chamadoHistorico['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chamadoHistorico['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
<div class="related">
	<h3><?php __('Related Chamados');?></h3>
	<?php if (!empty($usuario['Chamado'])):?>
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
		foreach ($usuario['Chamado'] as $chamado):
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
</div>
