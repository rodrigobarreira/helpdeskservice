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
<p style="color: black;">Menu</p>
<br />
<ul class="menu" style="font-size: 12px;">
	<li><?php echo $html->link('Chamados Abertos','/atendimento/chamadosAbertos'); ?></li>
	<li><?php echo $html->link('Chamados Encerrados','/atendimento/chamadosEncerrados'); ?></li>
</ul>