<?php
$paginator->options(
array(
		'update' => 'usuarios',
    	'url'=>array('controller'=>'admin', 'action'=>'usuarios', 'index/'), 
        'indicator' => 'loadAjax',
));

?>

<div id="usuarios">
<div class="grid">

<div class="grid_dados">
<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $paginator->sort('id');?></th>
		<th><?php echo $paginator->sort('nome');?></th>
		<th><?php echo $paginator->sort('matricula');?></th>
		<th><?php echo $paginator->sort('grupo_id');?></th>
		<th><?php echo $paginator->sort('setor_id');?></th>
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
	<tr <?php echo $class;?>>
		<td><?php echo $usuario['Usuario']['id']; ?></td>
		<td><?php echo $usuario['Usuario']['nome']; ?></td>
		<td><?php echo $usuario['Usuario']['matricula']; ?></td>
		<td><?php echo $usuario['Grupo']['descricao']; ?></td>
		<td><?php echo $usuario['Setor']['descricao']; ?></td>
		<td><?php echo $usuario['Usuario']['email']; ?></td>
		<td><?php echo $usuario['Usuario']['celular']; ?></td>
		<td><?php echo $usuario['Usuario']['telefone']; ?></td>
		<td><?php echo $usuario['Usuario']['ramal']; ?></td>
		<td><?php echo ($usuario['Usuario']['ativo'] == 1)?"Sim":"Não"; ?></td>
		<td><?php echo $usuario['Usuario']['data_cadastro']; ?></td>
		<td class="actions"><?php //echo $html->link(__('View', true), array('action'=>'view', $usuario['Usuario']['id'])); ?>
		<?php echo $html->link(__('Alterar', true), array('../alterar/'.$usuario['Usuario']['id'])); ?>
		<?php echo $html->link(__('Excluir', true), array('../excluir/', $usuario['Usuario']['id']), null, sprintf(__('Confirma a exclusão do usuário %s de matrícula %s? \n\nTodos os dados relacionados a ele também serão excluídos.', true), $usuario['Usuario']['nome'], $usuario['Usuario']['matricula'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

</div>
<div id="pesquisa" class="pesquisa"><?php
	 
	echo $form->input('campo', array(
		'type' => 'select',
		'options' => array(
			'Usuario.nome'=> "Nome",
			'Usuario.matricula' => 'Matrícula',
			'Usuario.grupo_id' => 'Grupo',
			'Usuario.setor_id' => 'Setor',
	),
		'label' => false,
		'style' => 'margin-left: 5px; float: left;',
		'div' => array('class' => false)
//'class' => 'campo'
));

echo $form->input('valor', array(
		'type' => 'text',
		'label' => false,
		'style' => 'margin-left: 5px; float: left; margin-left: 10px; width: 100px;',
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
		<?php if (!$session->check('UsuariosFiltro.filtro')){?>
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

			<?php if (!$session->check('UsuariosFiltro.filtro')){?>
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
			
			if (campo == 'Usuario.nome'){
				str_html = '<input type="text" id="valor" value="" style="float: left; margin-left: 10px; width: 100px;" name="data[valor]"/>';
			}else if(campo == 'Usuario.matricula'){
				str_html = '<input type="text" id="valor" value="" style="float: left; margin-left: 10px; width: 100px;" name="data[valor]"/>';				
			}else if(campo == 'Usuario.grupo_id'){
				str_html = jQuery.ajax({
					url: '<?php echo $html->url('../grupos/getGrupos')?>',         
					dataType: 'html',
				  	async: false,
				}).responseText;
			}else if(campo == 'Usuario.setor_id'){
				str_html = jQuery.ajax({
					url: '<?php echo $html->url('../setores/getSetores')?>',         
					dataType: 'html',
				  	async: false,
				}).responseText;
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
			'class' => 'barraFerramentaBotao',
			'id' => 'loadAjax',
			'style' => 'display: none'
		)
	);

	echo $html->link(
	$html->image('menu_add.gif',
		array(
			'alt' => 'Adicionar Usuário', 
			'align' => 'left', 
			'style' => 'border: solid 1px #fffff;',
			'class' => 'barraFerramentaBotao',
			'id' => 'botaoAdicionar'
		)
	),
	'../admin/usuarios/adicionar/',
	array(
		'class' => '',
	),
	null,
	false
);
	
echo $html->link(
	$html->image('localizar.png',
		array(
			'alt' => 'Localizar', 
			'align' => 'left', 
			'style' => 'border: solid 1px #fffff;',
			'class' => 'barraFerramentaBotao',
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
		'style' => 'margin-top: -1px;',
			));


				?> <script type="text/javascript">
	Event.observe('quantidadeRegistros', 'change', function(event) { new Ajax.Updater('usuarios','/helpdesk/admin/usuarios/index/limit:'+ this.value, {asynchronous:true, evalScripts:true, onComplete:function(request, json) {Element.hide('loadAjax');}, onLoading:function(request) {Element.show('loadAjax');}, requestHeaders:['X-Update', 'chamados']}) }, false);
	Event.observe('btnPesquisar', 'click', function(event) {
		if ($('valor').value != ""){ 
			new Ajax.Updater('usuarios','/helpdesk/admin/usuarios/index/fil_'+$('campo').value + ":"+$('valor').value, {asynchronous:true, evalScripts:true, onComplete:function(request, json) {Element.hide('loadAjax');}, onLoading:function(request) {Element.show('loadAjax');}, requestHeaders:['X-Update', 'chamados']})
		} 
	}, false); 
	Event.observe('btnRemoverFiltro', 'click', function(event) { new Ajax.Updater('usuarios','/helpdesk/admin/usuarios/index/fil_remove:true', {asynchronous:true, evalScripts:true, onComplete:function(request, json) {Element.hide('loadAjax');}, onLoading:function(request) {Element.show('loadAjax');}, requestHeaders:['X-Update', 'chamados']}) }, false);
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
