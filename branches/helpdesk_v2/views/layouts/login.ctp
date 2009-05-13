<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('HelpDesk System'); ?>
	</title>
	<?php
	echo $html->meta('icon');
	echo $html->css('css_helpdesk');
	echo $html->css('menu');
	echo $html->css('login');
	
	echo $scripts_for_layout;
	?>
</head>

<body>

<div id="pagina">

	<!-- main -->
	<div id="main_pagina">
	
		<div id="topo_pagina">
			<div id="topo_logo"><h1 id="logo_sistema"><a href="#"><span>Logo sistema</span></a></h1></div>
			
			<div id="div_menu_topo">
				<div id="data"><p class="txt_geral_pq_br"><?php echo $time->dataCompleta()?></p></div>
			</div>
			
			<div id="row_topo">
				<div id="div_titulos_secoes"><h1>LOGIN</h1></div>
			</div>			
			
		</div>
		
		<!-- conteudo -->
		<div id="main_pagina_login">
		
			<div id="navegacao"></div>
			
			<div id="main_login">
			<?php 
			if ($session->check('Message.flash')){
				
				$session->flash();
			}
			if ($session->check('Message.auth')){
				$session->flash('auth');
			}

			echo $content_for_layout; 
			?>	
			</div>
			<!-- fim conteudo -->		
	
	
		</div>
		
		
	</div>	
	<!-- fim main -->


	<!-- rodape -->
	<div id="base_pagina">
		<p>©2009 helpdesk | Todos os direitos reservados</p>
	</div>
	<!-- fim rodape -->



</div>

<?php echo $cakeDebug; ?>
</body>

</html>