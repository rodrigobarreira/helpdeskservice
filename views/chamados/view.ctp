<div class="chamados view">
<h2><?php  __('Chamado');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Problema'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamado['Problema']['id'], array('controller'=> 'problemas', 'action'=>'view', $chamado['Problema']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Usuario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamado['Usuario']['id'], array('controller'=> 'usuarios', 'action'=>'view', $chamado['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Hora Abertura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['data_hora_abertura']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Aberto Por'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['aberto_por']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao Problema'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['descricao_problema']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao Solucao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['descricao_solucao']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Hora Atendimento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['data_hora_atendimento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamado['Status']['id'], array('controller'=> 'status', 'action'=>'view', $chamado['Status']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Hora Encerramento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['data_hora_encerramento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Responsavel'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamado['Responsavel']['id'], array('controller'=> 'usuarios', 'action'=>'view', $chamado['Responsavel']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Chamado', true), array('action'=>'edit', $chamado['Chamado']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Chamado', true), array('action'=>'delete', $chamado['Chamado']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chamado['Chamado']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Chamados', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Problemas', true), array('controller'=> 'problemas', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Problema', true), array('controller'=> 'problemas', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Usuarios', true), array('controller'=> 'usuarios', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Usuario', true), array('controller'=> 'usuarios', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Status', true), array('controller'=> 'status', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Status', true), array('controller'=> 'status', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Avaliacoes', true), array('controller'=> 'avaliacoes', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Avaliacao', true), array('controller'=> 'avaliacoes', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Chamado Historicos', true), array('controller'=> 'chamado_historicos', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado Historico', true), array('controller'=> 'chamado_historicos', 'action'=>'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php  __('Related Avaliacoes');?></h3>
	<?php if (!empty($chamado['Avaliacao'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $chamado['Avaliacao']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Hora');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $chamado['Avaliacao']['data_hora'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nivel');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $chamado['Avaliacao']['nivel'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Chamado Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $chamado['Avaliacao']['chamado_id'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $html->link(__('Edit Avaliacao', true), array('controller'=> 'avaliacoes', 'action'=>'edit', $chamado['Avaliacao']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php __('Related Chamado Historicos');?></h3>
	<?php if (!empty($chamado['ChamadoHistorico'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Data Hora Incial'); ?></th>
		<th><?php __('Data Hora Final'); ?></th>
		<th><?php __('Chamado Id'); ?></th>
		<th><?php __('Usuario Id'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($chamado['ChamadoHistorico'] as $chamadoHistorico):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $chamadoHistorico['id'];?></td>
			<td><?php echo $chamadoHistorico['data_hora_incial'];?></td>
			<td><?php echo $chamadoHistorico['data_hora_final'];?></td>
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

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Chamado Historico', true), array('controller'=> 'chamado_historicos', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
