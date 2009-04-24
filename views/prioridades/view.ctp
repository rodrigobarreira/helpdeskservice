<div class="prioridades view">
<h2><?php  __('Prioridade');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prioridade['Prioridade']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prioridade['Prioridade']['descricao']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tempo Maximo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prioridade['Prioridade']['tempo_maximo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unidade Tempo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $prioridade['Prioridade']['unidade_tempo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php __('Related Chamados');?></h3>
	<?php if (!empty($prioridade['Chamado'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Sub Problema Id'); ?></th>
		<th><?php __('Usuario Id'); ?></th>
		<th><?php __('Data Abertura'); ?></th>
		<th><?php __('Hora Abertura'); ?></th>
		<th><?php __('Descricao Problema'); ?></th>
		<th><?php __('Descricao Solucao'); ?></th>
		<th><?php __('Prioridade Id'); ?></th>
		<th><?php __('Status Id'); ?></th>
		<th><?php __('Data Limite'); ?></th>
		<th><?php __('Hora Limite'); ?></th>
		<th><?php __('Data Fechamento'); ?></th>
		<th><?php __('Hora Fechamento'); ?></th>
		<th><?php __('Responsavel Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($prioridade['Chamado'] as $chamado):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $chamado['id'];?></td>
			<td><?php echo $chamado['sub_problema_id'];?></td>
			<td><?php echo $chamado['usuario_id'];?></td>
			<td><?php echo $chamado['data_abertura'];?></td>
			<td><?php echo $chamado['hora_abertura'];?></td>
			<td><?php echo $chamado['descricao_problema'];?></td>
			<td><?php echo $chamado['descricao_solucao'];?></td>
			<td><?php echo $chamado['prioridade_id'];?></td>
			<td><?php echo $chamado['status_id'];?></td>
			<td><?php echo $chamado['data_limite'];?></td>
			<td><?php echo $chamado['hora_limite'];?></td>
			<td><?php echo $chamado['data_fechamento'];?></td>
			<td><?php echo $chamado['hora_fechamento'];?></td>
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
	
</div>
