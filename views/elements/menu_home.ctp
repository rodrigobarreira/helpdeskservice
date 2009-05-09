<?php
/* Menu para criaÃ§Ã£o e acompanhamentos de chamados destinados a um determinado usuário
 * Todos, desde que logados, tem acesso a esse menu
 * Funcionalides:
 * 		Abrir Chamado : Cria um novo Chamado
 * 		Meus Chamados: Lista os chamados originados do usuário logado
 * 		Alterar Senha: Permite ao Usuário trocar a sua senha
 * 
 * Este tipo de menu está sendo implemtado para facilitar os testes da aplicaÃ§Ã£o
 * um outro mais especÃ­fico deve ser feito.
 */

?>
<p style="color: black;">Menu Provisório para teste das funcionalidades</p>
<br />
<ul class="menu">
	<li><?php echo $html->link('Abrir Chamado','/home/abrirChamado/'); ?></li>
	<li><?php echo $html->link('Meus Chamados','/home/meusChamados'); ?></li>
	<li>-</li>
	<li><?php echo $html->link('Alterar Senha','/home/alterarSenha'); ?></li>
</ul>