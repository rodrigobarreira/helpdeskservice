<?php
/* os menus serão exibidos de acordo com o grupo do usuário seguindo
 * as seguintes regras:
 * Solicitante: Home, Abrir Chamado, Meus Chamados
 * Atendente: os do Solicitanten e mais Consultar Chamados
 * Administrador: os do Atendente e mais Gerenciar Grupos, Gerenciar Usuários,
 * 		Gerenciar Prioridades, Gerenciar Status, Gerenciar Tipos de Problemas,
 * 
 * Este tipo de menu está sendo implemtado para facilitar os testes da aplicação
 * um outro mais específico deve ser feito.
 */

?>
<p style="color: black;">Menu Provisório para teste das funcionalidades</p>
<br />
<ul class="menu">
	<li><?php echo $html->link('Página Inicial','/'); ?></li>
	<li><?php echo $html->link('Abrir Chamado','/chamados/add/'); ?></li>
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
			<li><?php echo $html->link('Usuários','/usuarios/add/'); ?></li>
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