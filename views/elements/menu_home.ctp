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

?>
<div id="menu_secundario">
<ul class="menu" "font-size: 12px;">
	
	<li>
		<?php 
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'add_chamado.gif', array(
						'alt' => 'Abrir Chamado', 
					)
				).'Abrir Chamado',
				array(
					'class' => ''
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
		?>
	</li>
	<li>
		<?php
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'chamados.gif', array(
						'alt' => 'Meus Chamados', 
					)
				).'Meus Chamados',
				array(
					'class' => ''
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
		?>
	</li>
	<li>
		<?php 
	
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'edit_chamado.gif', array(
						'alt' => 'Alerar Senha', 
					)
				).'Alterar Senha',
				array(
					'class' => ''
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
		?>
	</li>
</ul>
</div>