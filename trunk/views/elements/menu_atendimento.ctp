<?php
$acao = $this->params['action'];
$classMenuMarcado = '';
?>
<div id="menu_secundario">
<ul class="menu""font-size: 12px;">

	<li><?php
	if ($acao == 'chamadosAbertos'){
		$classMenuMarcado = 'menuVerticalSelecionado';
	}
	echo $html->link(
	$html->tag(
				'span',
	$html->image(
					'folder_open_add.png', array(
						'alt' => 'Chamados Abertos', 
	)
	).'Chamados Abertos',
	array(
					'class' => $classMenuMarcado
	),
	false
	),
			'/atendimento/chamadosAbertos',
	array(
				'class' => ''
				),
				null,
				false
				);
				$classMenuMarcado ='';
				?></li>
	<li><?php
	if ($acao == 'chamadosEncerrados'){
		$classMenuMarcado = 'menuVerticalSelecionado';
	}
	echo $html->link(
	$html->tag(
				'span',
	$html->image(
					'folder_open_orange.png', array(
						'alt' => 'Chamados Encerrados', 
	)
	).'Chamados Encerrados',
	array(
					'class' => $classMenuMarcado
	),
	false
	),
			'/atendimento/chamadosEncerrados',
	array(
				'class' => ''
				),
				null,
				false
				);
				$classMenuMarcado ='';
				?></li>

</ul>
</div>
