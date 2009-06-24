<?php //TODO verifica a recursividade dos chamados($chamados)
//pr($chamados);
?>
<div class="grid"">
<table cellpadding="0" cellspacing="0">
<tr>
	
	<th><?php echo $paginator->sort('Nº', 'chamado_id');?></th>
	<th><?php echo $paginator->sort('Prioridade', 'chamado_prioridade_descricao');?></th>
	<th><?php echo $paginator->sort('Área', 'problema_tipo_area_nome');?></th>
	<th><?php echo $paginator->sort('Tipo de Problema', 'problema_tipo_descricao');?></th>
	<th><?php echo $paginator->sort('Título', 'chamado_titulo');?></th>
	<th><?php echo $paginator->sort('Solicitante', 'solicitante_nome');?></th>
	<th><?php echo $paginator->sort('Data Abertura', 'chamado_abertura');?></th>
	<th><?php echo $paginator->sort('Data Limite', 'chamado_limite');?></th>
	<th><?php echo $paginator->sort('Responsável', 'chamado_responsavel_nome');?></th>
	<th><?php echo $paginator->sort('Status', 'chamado_status_descricao');?></th>
	
</tr>
<?php
$i = 0;

foreach ($chamados as $chamado){
$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	?>	

		<tr <?php echo $class;?> >
		
		<td	>
			<?php echo $html->link($chamado['VwChamado']['chamado_id'], array('controller' => 'atendimento', 'action'=>'visualizarChamado', $chamado['VwChamado']['chamado_id']));?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['chamado_prioridade_descricao']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['problema_tipo_area_nome']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['problema_tipo_descricao']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['chamado_titulo']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['solicitante_nome']; ?>
		</td>
		<td>
			<?php
			$data = $time->dataBrasileira($chamado['VwChamado']['chamado_abertura']);
			echo substr($data, 0, 10). "<br />". substr($data, 11); 
			?>
		</td>
		<td>
			<?php
			$data = $time->dataBrasileira($chamado['VwChamado']['chamado_limite']);
			echo substr($data, 0, 10). "<br />". substr($data, 11);
			?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['chamado_responsavel_nome']; ?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['chamado_status_descricao']; ?>
		</td>
	</tr>
	
<?php } ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev($html->image('bt_anterior.jpg'), array('escape' => false), $html->image('bt_anterior_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
  	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next($html->image('bt_proximo.jpg'), array('escape' => false), $html->image('bt_proximo_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
	
</div>
