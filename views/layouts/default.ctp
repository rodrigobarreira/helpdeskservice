<?php 
if (empty($menu_selecionado)){
	switch ($usuarioGrupo){
		case 1: // solicitante
			$menu_selecionado = 'home';
			break;
		case 2: // atendente
			$menu_selecionado = 'atendente';
			break;
		case 3: // administrador
			$menu_selecionado = 'admin';
			break;
		case 4: // help
			$menu_selecionado = 'help';
			break;
		default:
			$menu_selecionado = 'home';
			$menu = 'menu_home';
			break;
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $html->charset(); ?>
	<title>
		<?php __('HelpDesk System'); ?>
	</title>
	<?php
	echo $html->meta('icn');

	echo $html->css('css_helpdesk');
	echo $html->css('menu');
	echo $html->css('menu_lateral');
	//echo $html->css('menu_style');
	//echo $html->css('cake.generic');
	
	echo $javascript->link('jquery/jquery');
	
	echo $javascript->link('prototype');
	echo $javascript->link('scriptaculous');
	
	echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="pagina">

	<!-- main -->
	<div id="main_pagina">
	
		<div id="topo_pagina">
			<div id="topo_logo"><h1 id="logo_sistema"><a href="<?php echo $html->url('/');?>"><span>Logo sistema</span></a></h1></div>
			<div id="div_menu_topo">
				<ul>
				<li>
					<?php 
					if ($menu_selecionado == 'home'){
						$class_menu = 'div_menu_topo';
						$class_menu_span = 'div_menu_topo_span';
					}else{
						$class_menu = 'echo $menu_selecionado;';
						$class_menu_span = '';
					}
					echo $html->link(
						$html->tag(
							'span',
							$html->image(
								'home.gif', array(
									'alt' => 'Home', 
									'align' => 'left'
								)
							).'Home',
							array(
								'class' => $class_menu_span
							),
							false
						),
						'/home',
						array(
							'class' => $class_menu
						), 
						null, 
						false
					);
					
					$class_menu = '';
					?>
				</li>
				<li>
					<?php
					if ($menu_selecionado == 'atendimento'){
						$menu = 'menu_atendimento';
						$class_menu = 'div_menu_topo';
						$class_menu_span = 'div_menu_topo_span';
					}else{
						$class_menu = '';
						$class_menu_span = '';
					}
					
					 
					if ($usuarioGrupo > 1){
						echo $html->link(
							$html->tag(
								'span',
								$html->image(
									'menu_mail.gif', array(
										'alt' => 'Atendimento', 
										'align' => 'left'
									)
								).'Atendimento',
								array(
									'class' => $class_menu_span
								),
								false
							),
							'/atendimento',
							array(
								'class' => $class_menu
							), 
							null, 
							false
						);
					}
					$class_menu = '';
					?>
				</li>
				<li>
					<?php
					if ($menu_selecionado == 'admin'){
						$class_menu = 'div_menu_topo';
						$class_menu_span = 'div_menu_topo_span';
					}else{
						$class_menu = '';
						$class_menu_span = '';
					} 
					if ($usuarioGrupo > 2){
						echo $html->link(
					
							$html->tag(
								'span',
								$html->image(
									'menu_chart.gif', array(
										'alt' => 'Administração', 
										'align' => 'left'
									)
								).'Administração',
								array(
									'class' => $class_menu_span
								),
								false
							),
							'/admin',
							array(
								'class' => $class_menu
							),
							null, 
							false
						);
					}
					$class_menu = '';
					$class_menu_span = '';
					?>
				</li>
				
				<li>
					<?php echo $html->link(
						$html->tag(
							'span',
							$html->image(
								'menu_sos.gif', array(
									'alt' => 'Help', 
									'align' => 'left'
								)
							).'Help',
							array(
								'class' => $class_menu_span
							),
							false
						),
						'#',
						array(
								'class' => $class_menu
						), 
						null, 
						false
						)
					?>
				</li>
				</ul>
				
				<div id="data"><p class="txt_geral_pq_br"><?php echo $time->dataCompleta()?></p></div>
			</div>
			
			<div id="row_topo">
				<div id="div_titulos_secoes"><h1><?php echo $title_for_layout; ?></h1></div>	
				<div id="div_usuario">
					<p class="txt_geral">Usuário: 
						<strong><?php e($usuarioNome)?></strong>
						<?php echo $html->link(
							$html->image('bt_sair.gif', array('alt' => 'Clique aqui para fazer logout', 'border' => '0')),
							'/usuarios/logout',
							null, null, false
						)?>
					</p>
				</div>
			</div>			
			
		</div>
		
		<!-- conteudo -->
		<div id="conteudo_pagina">
		
			<div id="navegacao"><p class="txt_geral_pq"><strong>Você está em: </strong>nome da pagina</p></div>
			
			<div id="main">
			
				<div id="col_conteudo">
					
					<!-- menu lateral -->
					<?php 
					if ($menu_selecionado == 'home'){
						$menu = 'menu_home';
					}elseif($menu_selecionado == 'atendimento'){
						$menu = 'menu_atendimento';
					}elseif($menu_selecionado == 'admin'){
						//if ($usuarioGrupo == 3) // admin area
							//$menu = 'menu_administrador_area';
						//else{
							$menu = 'menu_administrador_geral';
						//}
					}else{
						// menu padrão
						$menu = 'menu_home';
					}
					echo $this->renderElement($menu);	
					?>
					<!-- fim menu lateral -->
					
				</div>
				
				<!-- paginas internas -->
				<div id="main_conteudo">
				
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
				<!-- fim paginas internas -->	
					
			</div>
			<!-- fim conteudo -->		
	
	
		</div>
		
		
	</div>	
	<!-- fim main -->


	<!-- rodape -->
	<div id="base_pagina">
		<p>@2009 helpdesk | Todos os direitos reservados</p>
	</div>
	<!-- fim rodape -->



</div>
<?php echo $cakeDebug; ?>
</body>
</html>