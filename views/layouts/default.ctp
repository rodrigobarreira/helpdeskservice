<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>HELPDESK SYSTEM <?php echo $title_for_layout; ?></title>
	<?php echo $html->css('css_helpdesk') ?>
	<?php echo $html->css('cake.generic') ?>
	<?php echo $html->css('menu') ?>
	<?php echo $html->css('style') ?>
	<?php e($scripts_for_layout); ?>
</head>

<body>

<div id="pagina">

	<!-- main -->
	<div id="main_pagina">
	
		<div id="topo_pagina">
			<div id="topo_logo"><h1 id="logo_sistema"><a href="#"><span>Logo sistema</span></a></h1></div>
			
			<div id="div_menu_topo">
				<ul>
				<li><a href="#"><span><img align="left" src="../img/menu/add.gif" alt="add new" />Add New</span></a></li>
				<li><a href="#"><span><img align="left" src="../img/menu/mail.gif" alt="check mail" />Check	Mail</span></a></li>
				<li><a href="#"><span><img align="left" src="../img/menu/chart.gif" alt="statistic" />Statistic</span></a></li>
				<li><a href="#"><span><img align="left" src="../img/menu/mona.gif" alt="my pictures" />MyPictures</span></a></li>
				<li><a href="#"><span><img align="left" src="../img/menu/sos.gif" alt="help" />Help</span></a></li>
				</ul>
				
				<div id="data"><p class="txt_geral_pq_br">Quarta-feira, 18 de fevereiro de 2009</p></div>
			</div>
			
			<div id="row_topo">
				<div id="div_titulos_secoes"><h1>TITULOS DA PAGINAS</h1></div>	
				<div id="div_usuario">
					<p class="txt_geral">Bem-vindo: <strong><?php e($usuarioNome)?></strong><a href="#"><img src="../img/bt_sair.jpg" alt="Clique aqui para fazer logout" border="0" id="bt_sair"/></a></p>
				</div>
			</div>			
			
		</div>
		
		<!-- conteudo -->
		<div id="conteudo_pagina">
		
			<div id="navegacao"><p class="txt_geral_pq"><strong>VocÃª estÃ¡ em: </strong>nome da pagina</p></div>
			
			<div id="main">
			
				<div id="col_conteudo">
					<?php 
					echo $this->renderElement('menu');
					?>
				</div>
				
				<!-- paginas internas -->
				<div id="main_conteudo">
				
					<?php
					if ($session->check('Message.flash')){
						$session->flash();
					}
		
					echo $content_for_layout;
					?>	
				
				</div>
				<!-- fim paginas internas -->	
					
			</div>
			<!-- fim conteudo -->		
	
	
		</div>
		
		
	</div>	
	<!-- fim main -->


	<!-- rodape -->
	<div id="base_pagina">
		<p>Â©2009 helpdesk | Todos os direitos reservados</p>
	</div>
	<!-- fim rodape -->



</div>


</body>

</html>