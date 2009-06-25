
<?php
/* Menu para criação e acompanhamentos de chamados destinados a um determinado usu�rio
 * Todos, desde que logados, tem acesso a esse menu
 * Funcionalides:
 * 		Abrir Chamado : Cria um novo Chamado
 * 		Meus Chamados: Lista os chamados originados do usu�rio logado
 * 		Alterar Senha: Permite ao Usu�rio trocar a sua senha
 *
 * Este tipo de menu est� sendo implemtado para facilitar os testes da aplicação
 * um outro mais específico deve ser feito.
 */

$acao = $this->params['action'];
$classMenuMarcado = '';
?>
<div id="menu_secundario">
<ul class="menu""font-size: 12px;">

	<li><?php
	if ($acao == 'abrirChamado'){
		$classMenuMarcado = 'menuVerticalSelecionado';
	}
	echo $html->link(
	$html->tag(
				'span',
	$html->image(
					'add_chamado.gif', array(
						'alt' => 'Abrir Chamado', 
	)
	).'Abrir Chamado',
	array(
					'class' => $classMenuMarcado
	),
	false
	),
			'/home/abrirChamado',
	array(
				'class' => ''
				),
				null,
				false
				);
				$classMenuMarcado = '';
				?></li>
	<li><?php
	if ($acao == 'meusChamados'){
		$classMenuMarcado = 'menuVerticalSelecionado';
	}
	echo $html->link(
	$html->tag(
				'span',
	$html->image(
					'chamados.gif', array(
						'alt' => 'Meus Chamados', 
	)
	).'Meus Chamados',
	array(
					'class' => $classMenuMarcado
	),
	false
	),
			'/home/meusChamados',
	array(
				'class' => ''
				),
				null,
				false
				);
				$classMenuMarcado = '';
				?></li>
	<li><?php 
	if ($acao == 'alterarSenha'){
		$classMenuMarcado = 'menuVerticalSelecionado';
	}
	echo $html->link(
	$html->tag(
				'span',
	$html->image(
					'edit_chamado.gif', array(
						'alt' => 'Alerar Senha', 
	)
	).'Alterar Senha',
	array(
					'class' => $classMenuMarcado
	),
	false
	),
			'/home/alterarSenha',
	array(
				'class' => ''
				),
				null,
				false
				);
				$classMenuMarcado = '';
				?></li>
	
</ul>
</div>
