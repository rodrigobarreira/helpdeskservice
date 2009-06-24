<div class="usuarios index">
<?php 
$quantidade = 10;
$paginator->options(
	array('update'=>'usuarios', 
    	//'url'=>array('controller'=>'chamados', 'action'=>'meusChamadosAbertos', $quantidade), 
        'indicator' => 'loadAjax',
		'limit' => 10
));

?>

<div id="usuarios">
<span style="margin-left: 10px;">	
	<?php echo $html->link(__('Cadastrar', true), array('controller' => 'admin', 'action'=>'usuarios/cadastrar')); ?>
	
</span>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('grupo_id');?></th>
	<th><?php echo $paginator->sort('setor_id');?></th>
	<th><?php echo $paginator->sort('matricula');?></th>
	<th><?php echo $paginator->sort('nome');?></th>
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('celular');?></th>
	<th><?php echo $paginator->sort('telefone');?></th>
	<th><?php echo $paginator->sort('ramal');?></th>
	<th><?php echo $paginator->sort('ativo');?></th>
	<th><?php echo $paginator->sort('data_cadastro');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($usuarios as $usuario):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $usuario['Usuario']['id']; ?>
		</td>
		<td>
			<?php echo $usuario['Grupo']['descricao']; ?>
		</td>
		<td>
			<?php echo $usuario['Setor']['descricao']; ?>
		</td>
		<td>
			<?php echo $usuario['Usuario']['matricula']; ?>
		</td>
		<td>
			<?php echo $usuario['Usuario']['nome']; ?>
		</td>
		<td>
			<?php echo $usuario['Usuario']['email']; ?>
		</td>
		<td>
			<?php echo $usuario['Usuario']['celular']; ?>
		</td>
		<td>
			<?php echo $usuario['Usuario']['telefone']; ?>
		</td>
		<td>
			<?php echo $usuario['Usuario']['ramal']; ?>
		</td>
		<td>
			<?php echo ($usuario['Usuario']['ativo'] == 1)?"Sim":"Não"; ?>
		</td>
		<td>
			<?php echo $usuario['Usuario']['data_cadastro']; ?>
		</td>
		<td class="actions">
			<?php //echo $html->link(__('View', true), array('action'=>'view', $usuario['Usuario']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $usuario['Usuario']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $usuario['Usuario']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $usuario['Usuario']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>


<div class="paging">
	<?php echo $paginator->prev($html->image('bt_anterior.jpg'), array('escape' => false), $html->image('bt_anterior_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
  	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next($html->image('bt_proximo.jpg'), array('escape' => false), $html->image('bt_proximo_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
	
</div>
</div>
</div>