<?php
$paginator->options(
array(
		'update' => 'meusChamados',
    	'url'=>array('controller'=>'home', 'action'=>'meusChamados'), 
        'indicator' => 'loadAjax',
));

?>

<div id="meusChamados">
<div class="grid">

<div class="grid_dados">
<table cellpadding="0" cellspacing="0">
	<tr>
		<th style="width: 3%;"><?php echo $paginator->sort('Nº', 'chamado_id');?></th>
		<th style="width: 8%;"><?php echo $paginator->sort('Prioridade', 'chamado_prioridade_descricao');?></th>
		<th style="width: 10%;"><?php echo $paginator->sort('Área', 'problema_tipo_area_nome');?></th>
		<th style="width: 11%;"><?php echo $paginator->sort('Tipo de Problema', 'problema_tipo_descricao');?></th>
		<th style="width: 18%;"><?php echo $paginator->sort('Título', 'chamado_titulo');?></th>
		<th style="width: 9%;"><?php echo $paginator->sort('Data Abertura', 'chamado_abertura');?></th>
		<th style="width: 9%;"><?php echo $paginator->sort('Data Limite', 'chamado_limite');?></th>
		<th style="width: 10%;"><?php echo $paginator->sort('Status', 'chamado_status_descricao');?></th>
		<th style="width: 9%;"><?php echo $paginator->sort('Data Encerramento', 'chamado_encerramento');?></th>
		<th style="width: 8%;"><?php echo $paginator->sort('Responsável', 'chamado_responsavel_nome');?></th>
		<th style="width: 6%;"><?php echo 'Ação';?></th>
	</tr>

	<?php

	$i = 0;
		
	foreach ($vw_chamados as $chamado){
		$campos = array();
		foreach ($chamado as $campo){
			$campos = array_merge($campos, $campo); 
		}
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
		?>
	<tr <?php echo $class;?>>
		<td><?php echo $campos['chamado_id']; ?></td>
		<td><?php echo $campos['chamado_prioridade_descricao']; ?>
		</td>
		<td><?php echo $campos['problema_tipo_area_nome']; ?></td>
		<td><?php echo $campos['problema_tipo_descricao']; ?></td>

		<td><?php echo $campos['chamado_titulo']; ?></td>
		<td><?php
		$data = $time->dataBrasileira($campos['chamado_abertura']);
		echo substr($data, 0, 10). "<br />". substr($data, 11);
		?></td>
		<td><?php
		$data = $time->dataBrasileira($campos['chamado_limite']);
		echo substr($data, 0, 10). "<br />". substr($data, 11);
		?></td>
		<td><?php echo $campos['chamado_status_descricao']; ?></td>
		<td><?php
		$data = $time->dataBrasileira($campos['chamado_encerramento']);
		echo substr($data, 0, 10). "<br />". substr($data, 11);
		?></td>
		<td><?php echo $campos['chamado_responsavel_nome']; ?></td>
		<td><?php echo $html->link('Visualizar', array('controller'=>'home', 'action' => 'visualizarChamado', $chamado['VwChamado']['chamado_id'], 'limit' => $quantidade)); ?>
		</td>

	</tr>

	<?php } ?>
</table>
</div>
<div id="pesquisa" class="pesquisa"><?php
	 
	echo $form->input('campo', array(
		'type' => 'select',
		'options' => array(
			'chamado_id'=> "Número Chamado",
			'chamado_prioridade_id' => 'Prioridade',
			'problema_tipo_area_id' => 'Área',
			'chamado_titulo' => 'Título',
			'chamado_status_id' => 'Status',
	),
		'label' => false,
		'style' => 'margin-left: 5px; float: left;',
		'div' => array('class' => false)
//'class' => 'campo'
));

echo $form->input('valor', array(
		'type' => 'text',
		'label' => false,
		'style' => 'margin-left: 5px; float: left; margin-left: 10px; width: 30px;',
		'div' => array ('id' => 'filtroValor')

));


echo $form->button('btPesquisar', array(

		'label' => false,
		'style' => 'margin-left: 5px; float: left; margin-left: 10px',
		'div' => array ('id' => 'filtroValor'),
		'id'=> 'btnPesquisar' ,
		'value'=> "Filtrar"
		));

echo $form->button('btnRemoverFiltro', array(
		'label' => false,
		'style' => 'margin-left: 5px; float: left; margin-left: 10px',
		'div' => array ('id' => 'removerFiltro'),
		'id'=> 'btnRemoverFiltro' ,
		'value'=> "Remover Filtro"
		));
		?></div>
<div class="barraFerramentas"><script type="text/javascript">
	jQuery(document).ready(function(){
		<?php if (!$session->check('MeusChamadosFiltro.filtro')){?>
		//jQuery("#btnRemoverFiltro").remove();
		jQuery("#botaoPesquisa").attr("src", "/helpdesk/img/localizar.png");
		<?php 
		}else{
			?>
			
			jQuery("#botaoPesquisa").attr("src", "/helpdesk/img/localizar2.png");
			<?php 
		}
		?>;
		var str_html = "";
		
		jQuery(":input[type=text]").focus(function () {
			jQuery(this).css({
				"border":"solid 1px #fad184", 
				"border-style":"inset"
			});
			 
	    });
		jQuery(":input[type=text]").blur(function () {
			jQuery(this).css({
				"border":"solid 1px #000000",
				 
				"border-style":"inset"
			});
			 
	    });
	    	
		jQuery("#botaoPesquisa").click(function () {
			jQuery("#pesquisa").slideToggle("fast");
			jQuery("#campo").focus();

			<?php if (!$session->check('MeusChamadosFiltro.filtro')){?>
			jQuery("#btnRemoverFiltro").remove();
			
			<?php 
			}
			?>
			
    	});

		jQuery("#btnPesquisar").click(function () {
			if(jQuery("#valor").val() == ""){
				alert("Insira um valor no campo marcado para efetuar o filtro");
				jQuery("#valor").css({"background-color":"#fff444"});
				jQuery("#valor").focus();
				return false;
			};			
    	});
    	
		jQuery("#campo").change(function () {
			var campo = this.value;
			str_html = "";
			
			if (campo == 'chamado_id'){
				str_html = '<input type="text" id="valor" value="" style="float: left; margin-left: 10px; width: 30px;" name="data[valor]"/>';
			}else if(campo == 'chamado_prioridade_id'){
				str_html = jQuery.ajax({
					url: '<?php echo $html->url('../prioridades/getPrioridades') ?>',         
				  	dataType: 'html',
				  	async: false,
				}).responseText;
			}else if(campo == 'chamado_status_id'){
				str_html = jQuery.ajax({
					url: '<?php echo $html->url('../status/getStatus')?>',         
					dataType: 'html',
				  	async: false,
				}).responseText;				
			}else if(campo == 'problema_tipo_area_id'){
				str_html = jQuery.ajax({
					url: '<?php echo $html->url('../setores/getAreas')?>',         
					dataType: 'html',
				  	async: false,
				}).responseText;
			}else if(campo == 'chamado_titulo'){
				str_html = '<input type="text" id="valor" value="" style="float: left; margin-left: 10px;" name="data[valor]"/>';
			}else{
				alert("Campo não reconhecido!");
			}

			jQuery("#valor").remove();
			jQuery("#filtroValor").append(str_html);
			jQuery("#valor").focus();
    	});
    	
  	});

		
	
	</script>

<div class="barraFerramentasElemento">
<?php 
echo $html->image('LoadAjax.gif',
		array(
			'alt' => 'Localizar', 
			'align' => 'left', 
			'style' => 'border: solid 1px #fffff;',
			'class' => 'botaoLocalizar',
			'id' => 'loadAjax',
			'style' => 'display: none'
		)
	)
?>

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
	?></div>
<div class="separaElementos"></div>
				<?php echo $form->input('quantidadeRegistros', array(
		'options' => array ('5' => 5, '10' => 10, '15' => 15, '20' => 20),
		'selected' => $quantidade,
		'empty' => false,
		'label' => false,
		'div' => 'barraFerramentasElemento',
		'id' => 'quantidadeRegistros',
		'style' => 'margin-top: -1px;',
				//'onchange' =>
				//onchange' => "function(event) { new Ajax.Updater('meusChamados','/helpdesk/home/meusChamados/page:1/sort:chamado_id/direction:asc', {asynchronous:true, evalScripts:true, onComplete:function(request, json) {Element.hide('loadAjax');}, onLoading:function(request) {Element.show('loadAjax');}, requestHeaders:['X-Update', 'meusChamados']}) };"

				));


				?> <script type="text/javascript">
	Event.observe('quantidadeRegistros', 'change', function(event) { new Ajax.Updater('meusChamados','/helpdesk/home/meusChamados/limit:'+ this.value, {asynchronous:true, evalScripts:true, onComplete:function(request, json) {Element.hide('loadAjax');}, onLoading:function(request) {Element.show('loadAjax');}, requestHeaders:['X-Update', 'meusChamados']}) }, false);
	Event.observe('btnPesquisar', 'click', function(event) {
		if ($('valor').value != ""){ 
			new Ajax.Updater('meusChamados','/helpdesk/home/meusChamados/fil_'+$('campo').value + ":"+$('valor').value, {asynchronous:true, evalScripts:true, onComplete:function(request, json) {Element.hide('loadAjax');}, onLoading:function(request) {Element.show('loadAjax');}, requestHeaders:['X-Update', 'meusChamados']})
		} 
	}, false); 
	Event.observe('btnRemoverFiltro', 'click', function(event) { new Ajax.Updater('meusChamados','/helpdesk/home/meusChamados/fil_remove:true', {asynchronous:true, evalScripts:true, onComplete:function(request, json) {Element.hide('loadAjax');}, onLoading:function(request) {Element.show('loadAjax');}, requestHeaders:['X-Update', 'meusChamados']}) }, false);
	</script>
<div class="separaElementos"></div>
<div class="barraFerramentasElemento">
<div class="paging">
	<?php 
	echo $paginator->prev($html->image('bt_anterior.jpg'), array('escape' => false, 'style' => 'margin-right: 5px'), $html->image('bt_anterior_off.jpg'), array('class'=>'disabled', 'escape' => false, 'style' => 'margin-right: 5px'));
	echo $paginator->numbers();
	echo $paginator->next($html->image('bt_proximo.jpg'), array('escape' => false, 'style' => 'margin-left: 5px'), $html->image('bt_proximo_off.jpg'), array('class'=>'disabled', 'escape' => false , 'style' => 'margin-left: 5px'));
	?>
</div>
</div>
</div>

</div>
</div>
