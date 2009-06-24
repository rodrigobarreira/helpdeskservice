<?php  
//if(!isset($quantidade)) $quantidade = null;

$paginator->options(
	array(
		'update' => 'meusChamados',
    	'url'=>array('controller'=>'home', 'action'=>'meusChamados'), 
        'indicator' => 'loadAjax',
));

?> 


<div id="meusChamados">
<div class="grid">
<div id="loadAjax" style="position: absolute; margin-left: 250px; display:none;">
	<?php echo $html->image('LoadAjax.gif', array());?>
</div>

<!-- <fieldset  style="width: 100%; padding-left: 0px">
<legend>Filtros</legend>
</fieldset> -->
<div class="grid_dados">
<table cellpadding="0" cellspacing="0">
<tr>
	<th style="width:4%;"><?php echo $paginator->sort('Nº', 'chamado_id');?></th>
	<th style="width:8%;"><?php echo $paginator->sort('Prioridade', 'chamado_prioridade_descricao');?></th>
	<th style="width:10%;"><?php echo $paginator->sort('Área', 'problema_tipo_area_nome');?></th>
	<th style="width:13%;"><?php echo $paginator->sort('Tipo de Problema', 'problema_tipo_descricao');?></th>
	<th style="width:18%;"><?php echo $paginator->sort('Título', 'chamado_titulo');?></th>
	<th style="width:9%;"><?php echo $paginator->sort('Data Abertura', 'chamado_abertura');?></th>
	<th style="width:9%;"><?php echo $paginator->sort('Data Limite', 'chamado_limite');?></th>
	<th style="width:10%;"><?php echo $paginator->sort('Status', 'chamado_status_descricao');?></th>
	<th style="width:9%;"><?php echo $paginator->sort('Data Encerramento', 'chamado_encerramento');?></th>
	<th style="width:8%;"><?php echo $paginator->sort('Responsável', 'chamado_responsavel_nome');?></th>
	<th style="width:8%;"><?php echo 'Ação';?></th>
</tr>

<?php

//pr($vw_chamados);
$i = 0;
foreach ($vw_chamados as $chamado):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr  <?php echo $class;?> >
		<td>
		<?php echo $chamado['VwChamado']['chamado_id']; ?>

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
			<?php echo $chamado['VwChamado']['chamado_status_descricao']; ?>
			
		</td>
		<td>
			<?php
			$data = $time->dataBrasileira($chamado['VwChamado']['chamado_encerramento']);
			echo substr($data, 0, 10). "<br />". substr($data, 11); 
			?>
		</td>
		<td>
			<?php echo $chamado['VwChamado']['chamado_responsavel_nome']; ?>
		</td>
		<td	>
		<?php echo $html->link('Visualizar', array('controller'=>'home', 'action' => 'visualizarChamado', $chamado['VwChamado']['chamado_id'], 'limit' => $quantidade)); ?>
		</td>
		
	</tr>
	
<?php endforeach; ?>
</table>
</div>
<div id="pesquisa" class="pesquisa">
	<?php 
	echo $form->input('campo', array(
		'type' => 'select',
		'options' => array(
			'chamado_id'=> "Número Chamado",
			'chamado_prioridade_descricao' => 'Prioridade',
			'chamado_status_descricao' => 'Status',
			'problema_tipo_area_nome' => 'Área',
			'chamado_titulo' => 'Título',
			
		),
		'label' => false,
		'style' => 'margin-left: 5px; float: left;',
		'div' => array('class' => false)
		//'class' => 'campo'
	));

	echo $form->input('valor', array(
		'type' => 'text',
		'label' => false,
		'style' => 'margin-left: 5px; , float: left;',
		'div' => array ('id' => 'filtroValor')
		
	));  
	?>
</div>
<div class="barraFerramentas">
	<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery(":input").focus(function () {
			jQuery(this).css({ backgroundColor:"yellow"});
			 
	    });
		jQuery(":input").blur(function () {
			jQuery(this).css({ 'background-color':"#ffffff"});
			 
	    });
	    	
		jQuery("#botaoPesquisa").click(function () {
			jQuery("#pesquisa").slideToggle("fast");
			jQuery("#campo").focus();
		  	
    	});
		jQuery("#campo").change(function () {
			var campo = this.value;
			var html = "";
			if (campo == 'chamado_id'){
				html = '<input type="text" id="valor" value="" style="margin-left: 5px;" name="data[valor]"/>';
			}else if(campo == 'chamado_prioridade_descricao'){
				jQuery.ajax({
					url: '../prioridades/getPrioridades',         
				  	type: 'post',
				  	data: {term: this.innerHTML},
				  	dataType: 'html',
				  	success: function(data) {
						html = data;
					  	jQuery("#valor").remove();
						jQuery("#filtroValor").append(data);
						jQuery("#valor").focus();
				  	},
				  	
				});
			}else if(campo == 'chamado_status_descricao'){
				jQuery.ajax({
					url: '../status/getStatus',         
				  	type: 'post',
				  	data: {term: this.innerHTML},
				  	dataType: 'html',
				  	success: function(data) {
						html = data;
					  	jQuery("#valor").remove();
						jQuery("#filtroValor").append(data);
						jQuery("#valor").focus();
				  	},
				  	
				});				
			}else if(campo == 'problema_tipo_descricao'){
				html = '<input type="text" id="valor" value="" style="font-size: 9px; margin-left: 5px;" name="data[valor]"/>';
			}else if(campo == 'chamado_titulo'){
				
			}else{
				alert("Campo não reconhecido!");
			}
			jQuery("#valor").remove();
			//jQuery("#filtroValor").append(html);
			
    	});
    	
  	});

		
	
	</script>
	
	<div class="barraFerramentasElemento">
	<?php 
	echo $html->link(
		$html->image('localizar.png', 
			array(
				'alt' => 'Localizar', 
				'align' => 'left', 
				'style' => 'border: solid 1px #fffff;',
				'class' => 'botaoLocalizar',
				'id' => 'botaoPesquisa'
			)
		),
		'#',
		array(
			'class' => '',
			
			
		),
		null, 
		false
	);
	?>
	</div>
	<div class="separaElementos"></div>
	<?php echo $form->input('quantidadeRegistros', array(
		'options' => array ('5' => 5, '10' => 10, '15' => 15, '20' => 20),
		'selected' => $quantidade,
		'empty' => false,
		'label' => false,
		'div' => 'barraFerramentasElemento',
		'id' => 'quantidadeRegistros',
		'style' => 'height: 22px; font-size: 11px; margin-top: -1px;',
		//'onchange' => 
		//onchange' => "function(event) { new Ajax.Updater('meusChamados','/helpdesk/home/meusChamados/page:1/sort:chamado_id/direction:asc', {asynchronous:true, evalScripts:true, onComplete:function(request, json) {Element.hide('loadAjax');}, onLoading:function(request) {Element.show('loadAjax');}, requestHeaders:['X-Update', 'meusChamados']}) };"
		
	));
	
	
	?>
	<script type="text/javascript">
	Event.observe('quantidadeRegistros', 'change', function(event) { new Ajax.Updater('meusChamados','/helpdesk/home/meusChamados/limit:'+ this.value, {asynchronous:true, evalScripts:true, onComplete:function(request, json) {Element.hide('loadAjax');}, onLoading:function(request) {Element.show('loadAjax');}, requestHeaders:['X-Update', 'meusChamados']}) }, false);
	</script>
	<div class="separaElementos"></div>
	<div class="barraFerramentasElemento">
	<div class = "paging">
	<?php echo $paginator->prev($html->image('bt_anterior.jpg'), array('escape' => false), $html->image('bt_anterior_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
  	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next($html->image('bt_proximo.jpg'), array('escape' => false), $html->image('bt_proximo_off.jpg'), array('class'=>'disabled', 'escape' => false));?>
	</div>
	</div>
</div>

</div>
</div>
