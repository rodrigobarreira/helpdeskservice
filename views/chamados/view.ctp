<div class="chamados view">
<h2><?php  __('Chamado');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sub Problema'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamado['SubProblema']['id'], array('controller'=> 'sub_problemas', 'action'=>'view', $chamado['SubProblema']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Usuario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamado['Usuario']['id'], array('controller'=> 'usuarios', 'action'=>'view', $chamado['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Abertura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['data_abertura']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hora Abertura'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['hora_abertura']; ?>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Prioridade'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamado['Prioridade']['id'], array('controller'=> 'prioridades', 'action'=>'view', $chamado['Prioridade']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamado['Status']['id'], array('controller'=> 'status', 'action'=>'view', $chamado['Status']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Limite'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['data_limite']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hora Limite'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['hora_limite']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Fechamento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['data_fechamento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hora Fechamento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamado['Chamado']['hora_fechamento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Responsavel'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamado['Responsavel']['id'], array('controller'=> 'usuarios', 'action'=>'view', $chamado['Responsavel']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
	<div class="related">
		<h3><?php  __('Related Avaliacoes');?></h3>
	<?php if (!empty($chamado['Avaliacao'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $chamado['Avaliacao']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $chamado['Avaliacao']['data'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hora');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $chamado['Avaliacao']['hora'];?>
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
		<th><?php __('Data'); ?></th>
		<th><?php __('Hora'); ?></th>
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
