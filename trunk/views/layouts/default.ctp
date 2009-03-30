<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>HELPDESK SYSTEM <?php echo $title_for_layout; ?></</title>
	<?php echo $html->css('css_helpdesk') ?>
	<?php echo $html->css('cake.generic') ?>
	<?php e($scripts_for_layout); ?>
</head>

<body>

<div id="pagina">

	<!-- main -->
	<div id="main_pagina">
	
		<div id="topo_pagina">
			<div id="topo_logo"><h1 id="logo_sistema"><a href="#"><span>Logo sistema</span></a></h1></div>
			<div id="div_menu_topo">		
			
			</div>
			
			<div id="sombra_bar_sec">
				<div id="div_titulos_secoes"><h1>TITULOS DA PAGINAS</h1></div>
				<div id="sombra_bar_sec_cont"><p class="txt_geral_pq">Quarta-feira, 18 de fevereiro de 2009</p></div>
			</div>			
			
		</div>
		
		<!-- conteudo -->
		<div id="conteudo_pagina">
		
			<div id="navegacao"><p class="txt_geral_pq"><strong>Você está em: </strong>nome da pagina</p></div>
			
			<div id="main">
			
				<div id="col_conteudo">
					<p class="txt_geral">
					Bem-vindo:
					<br />
					<strong>NOME DO USUÁRIO</strong>					
					</p>
					<br />
					<a href="#"><img src="img/bt_sair.jpg" alt="Clique aqui para fazer logout" border="0"/></a>
				</div>
				
				<!-- paginas internas -->
				<div id="main_conteudo">
				
					<p class="txt_geral">
					<?php
			if ($session->check('Message.flash')){
				$session->flash();
			}

			echo $content_for_layout;
			?>

				
				</div>
				<!-- fim paginas internas -->		
			</div>
			
		</div>
		<!-- fim conteudo -->
	
	</div>
	
	<!-- rodape -->
	<div id="base_pagina">
		<p>©2009 helpdesk | Todos os direitos reservados </p>
	</div>
	<!-- fim rodape -->
	
	
	<!-- fim main -->

</div>


</body>

</html>