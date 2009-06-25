<div class="usuarios view">
<h2><?php  __('Usuario');?></h2>
<dl>
<?php $i = 0; $class = ' class="altrow"';?>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['id']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Grupo'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $html->link($usuario['Grupo']['id'], array('controller'=> 'grupos', 'action'=>'view', $usuario['Grupo']['id'])); ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Setor'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $html->link($usuario['Setor']['id'], array('controller'=> 'setores', 'action'=>'view', $usuario['Setor']['id'])); ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Matricula'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['matricula']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Nome'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['nome']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Senha'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['senha']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['email']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Celular'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['celular']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Telefone'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['telefone']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Ramal'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['ramal']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Ativo'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['ativo']; ?>
	&nbsp;</dd>
	<dt <?php if ($i % 2 == 0) echo $class;?>><?php __('Data Cadastro'); ?></dt>
	<dd <?php if ($i++ % 2 == 0) echo $class;?>><?php echo $usuario['Usuario']['data_cadastro']; ?>
	&nbsp;</dd>
</dl>
</div>
<div class="actions">
<ul>
	<li><?php echo $html->link(__('Edit Usuario', true), array('action'=>'edit', $usuario['Usuario']['id'])); ?>
	</li>
	<li><?php echo $html->link(__('Delete Usuario', true), array('action'=>'delete', $usuario['Usuario']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $usuario['Usuario']['id'])); ?>
	</li>
	<li><?php echo $html->link(__('List Usuarios', true), array('action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Usuario', true), array('action'=>'add')); ?>
	</li>
	<li><?php echo $html->link(__('List Grupos', true), array('controller'=> 'grupos', 'action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Grupo', true), array('controller'=> 'grupos', 'action'=>'add')); ?>
	</li>
	<li><?php echo $html->link(__('List Setores', true), array('controller'=> 'setores', 'action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Setor', true), array('controller'=> 'setores', 'action'=>'add')); ?>
	</li>
	<li><?php echo $html->link(__('List Chamado Historicos', true), array('controller'=> 'chamado_historicos', 'action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Chamado Historico', true), array('controller'=> 'chamado_historicos', 'action'=>'add')); ?>
	</li>
	<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?>
	</li>
	<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?>
	</li>
</ul>
</div>
<div class="related">
<h3><?php __('Related Chamado Historicos');?></h3>
<?php if (!empty($usuario['ChamadoHistorico'])):?>
<table cellpadding="0" cellspacing="0">
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
	foreach ($usuario['ChamadoHistorico'] as $chamadoHistorico):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	?>
	<tr <?php echo $class;?>>
		<td><?php echo $chamadoHistorico['id'];?></td>
		<td><?php echo $chamadoHistorico['data_hora_incial'];?></td>
		<td><?php echo $chamadoHistorico['data_hora_final'];?></td>
		<td><?php echo $chamadoHistorico['chamado_id'];?></td>
		<td><?php echo $chamadoHistorico['usuario_id'];?></td>
		<td><?php echo $chamadoHistorico['descricao'];?></td>
		<td class="actions"><?php echo $html->link(__('View', true), array('controller'=> 'chamado_historicos', 'action'=>'view', $chamadoHistorico['id'])); ?>
		<?php echo $html->link(__('Edit', true), array('controller'=> 'chamado_historicos', 'action'=>'edit', $chamadoHistorico['id'])); ?>
		<?php echo $html->link(__('Delete', true), array('controller'=> 'chamado_historicos', 'action'=>'delete', $chamadoHistorico['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chamadoHistorico['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
	<?php endif; ?>

<div class="actions">
<ul>
	<li><?php echo $html->link(__('New Chamado Historico', true), array('controller'=> 'chamado_historicos', 'action'=>'add'));?>
	</li>
</ul>
</div>
</div>
<div class="related">
<h3><?php __('Related Chamados');?></h3>
	<?php if (!empty($usuario['Chamado'])):?>
<table cellpadding="0" cellspacing="0">
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
	foreach ($usuario['Chamado'] as $chamado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	?>
	<tr <?php echo $class;?>>
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
		<td class="actions"><?php echo $html->link(__('View', true), array('controller'=> 'chamados', 'action'=>'view', $chamado['id'])); ?>
		<?php echo $html->link(__('Edit', true), array('controller'=> 'chamados', 'action'=>'edit', $chamado['id'])); ?>
		<?php echo $html->link(__('Delete', true), array('controller'=> 'chamados', 'action'=>'delete', $chamado['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chamado['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
	<?php endif; ?>

<div class="actions">
<ul>
	<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add'));?>
	</li>
</ul>
</div>
</div>
