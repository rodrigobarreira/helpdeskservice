<div class="avaliacoes view">
<h2><?php  __('Avaliacao');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $avaliacao['Avaliacao']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data Hora'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $avaliacao['Avaliacao']['data_hora']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nivel'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $avaliacao['Avaliacao']['nivel']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Chamado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($avaliacao['Chamado']['id'], array('controller'=> 'chamados', 'action'=>'view', $avaliacao['Chamado']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Avaliacao', true), array('action'=>'edit', $avaliacao['Avaliacao']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Avaliacao', true), array('action'=>'delete', $avaliacao['Avaliacao']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $avaliacao['Avaliacao']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Avaliacoes', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Avaliacao', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
