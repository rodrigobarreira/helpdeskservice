<div class="chamadoHistoricos view">
<h2><?php  __('ChamadoHistorico');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamadoHistorico['ChamadoHistorico']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamadoHistorico['ChamadoHistorico']['data']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Hora'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamadoHistorico['ChamadoHistorico']['hora']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Chamado Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamadoHistorico['ChamadoHistorico']['chamado_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Usuario'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($chamadoHistorico['Usuario']['id'], array('controller'=> 'usuarios', 'action'=>'view', $chamadoHistorico['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $chamadoHistorico['ChamadoHistorico']['descricao']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit ChamadoHistorico', true), array('action'=>'edit', $chamadoHistorico['ChamadoHistorico']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete ChamadoHistorico', true), array('action'=>'delete', $chamadoHistorico['ChamadoHistorico']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $chamadoHistorico['ChamadoHistorico']['id'])); ?> </li>
		<li><?php echo $html->link(__('List ChamadoHistoricos', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New ChamadoHistorico', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Chamados', true), array('controller'=> 'chamados', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Chamado', true), array('controller'=> 'chamados', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Usuarios', true), array('controller'=> 'usuarios', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Usuario', true), array('controller'=> 'usuarios', 'action'=>'add')); ?> </li>
	</ul>
</div>
