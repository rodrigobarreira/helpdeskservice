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
<p style="color: black;">Menu Provisório para teste das funcionalidades</p>
<br />
<ul class="menu">
	<!--tag > nome do link > controler/ac�o-->
	<li><?php echo $html->link('Usuários','/administracao/usuarios/'); ?></li>
	<li><?php echo $html->link('Tipo de Problema','/problemas/index'); ?></li>
	<li><?php echo $html->link('Relat�rios','/relatorio/index');?></li>
	<li><?php echo $html->link('Alterar Senha','/home/alterarSenha'); ?></li>
</ul>
