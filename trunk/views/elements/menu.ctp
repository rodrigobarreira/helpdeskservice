<?php
/* os menus serão exibidos de acordo com o grupo do usu�rio seguindo
 * as seguintes regras:
 * Solicitante: Home, Abrir Chamado, Meus Chamados
 * Atendente: os do Solicitanten e mais Consultar Chamados
 * Administrador: os do Atendente e mais Gerenciar Grupos, Gerenciar Usu�rios,
 * 		Gerenciar Prioridades, Gerenciar Status, Gerenciar Tipos de Problemas,
 *
 * Este tipo de menu est� sendo implemtado para facilitar os testes da aplicação
 * um outro mais específico deve ser feito.
 */

?>
<p style="color: black;">Menu Provis�rio para teste das funcionalidades</p>
<br />
<ul class="menu">
	<li><?php echo $html->link('Abrir Chamado','/chamados/abrirChamado/'); ?></li>
	<li><?php echo $html->link('Meus Chamados','/chamados/listaChamados'); ?></li>
	<?php
	if ($usuarioGrupo == 2 || $usuarioGrupo == 3){ // grupo atendente ou admin
		?>
	<li>Atendente</li>
	<li><?php echo $html->link('Consultar Chamados','/chamados/index'); ?></li>
	<?php
	if ($usuarioGrupo == 3){ // grupo administrador
		?>
	<li>Admin</li>
	<li><?php echo $html->link('Grupos','/grupos/index'); ?></li>
	<li><?php echo $html->link('Usu�rios','/usuarios/add/'); ?></li>
	<li><?php echo $html->link('Prioridades','/prioridades/index'); ?></li>
	<li><?php echo $html->link('Status','/status/index'); ?></li>
	<li><?php echo $html->link('Problemas','/problemas/index/'); ?></li>
	<?php
	}
	?>
	<?php
	}
	?>
	<li>-</li>
	<li><?php echo $html->link('Alterar Senha','/usuarios/alterarSenha'); ?></li>
	<li><?php echo $html->link('Logout','/usuarios/logout'); ?></li>
</ul>
