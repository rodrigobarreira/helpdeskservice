<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>HELPDESK SYSTEM <?php echo $title_for_layout; ?></title>
	<?php echo $html->css('css_helpdesk') ?>
	<?php echo $html->css('cake.generic') ?>
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
				
			</div>
			
			<div id="row_topo">
				<div id="div_titulos_secoes"><h1>Página de Acesso ao Sistema</h1></div>
				<div id="data"><p class="txt_geral_pq"><?php echo $time->dataCompleta()?></p></div>
			</div>			
			
		</div>
		
		<!-- conteudo -->
		<div id="conteudo_pagina">
		
			
			<div id="main">
				
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
		<p><?php echo date("Y");?> helpdesk | Todos os direitos reservados</p>
	</div>
	<!-- fim rodape -->



</div>


</body>

</html>