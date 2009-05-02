<div class="problemas view">
<h2><?php  __('Problema');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $problema['Problema']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descricao'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $problema['Problema']['descricao']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php __('Related Sub Problemas');?></h3>
	<?php if (!empty($problema['SubProblema'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Problema Id'); ?></th>
		<th><?php __('Descricao'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($problema['SubProblema'] as $subProblema):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $subProblema['id'];?></td>
			<td><?php echo $subProblema['problema_id'];?></td>
			<td><?php echo $subProblema['descricao'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'sub_problemas', 'action'=>'view', $subProblema['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'sub_problemas', 'action'=>'edit', $subProblema['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'sub_problemas', 'action'=>'delete', $subProblema['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $subProblema['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
