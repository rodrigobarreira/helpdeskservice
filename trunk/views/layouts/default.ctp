	
<?php
/* SVN FILE: $Id: default.ctp 7690 2008-10-02 04:56:53Z nate $ */
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.cake.console.libs.templates.skel.views.layouts
 * @since			CakePHP(tm) v 0.10.0.1076
 * @version			$Revision: 7690 $
 * @modifiedby		$LastChangedBy: nate $
 * @lastmodified	$Date: 2008-10-02 00:56:53 -0400 (Thu, 02 Oct 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
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
	echo $html->css('menu_style');
	//echo $html->css('cake.generic');
	echo $javascript->link('prototype');
	echo $javascript->link('scriptaculous');
	//echo $javascript->link('jquery/jquery-1.3.1.min');
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
				<ul>
				<li>
					<?php echo $html->link(
						$html->tag(
							'span',
							$html->image(
								'menu_add.gif', array(
									'alt' => 'Home', 
									'align' => 'left'
								)
							).'Home',
							null,
							false
						),
						'/home',
						null, null, false
						)
					?>
				</li>
				<li>
					<?php 
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
								null,
								false
							),
							'/atendimento',
							null, null, false
						);
					}
					?>
				</li>
				<li>
					<?php 
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
								null,
								false
							),
							'/administracao',
							null, null, false
						);
					}
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
							null,
							false
						),
						'#',
						null, null, false
						)
					?>
				</li>
				</ul>
				
				<div id="data"><p class="txt_geral_pq_br"><?php echo $time->dataCompleta()?></p></div>
			</div>
			
			<div id="row_topo">
				<div id="div_titulos_secoes"><h1><?php echo $title_for_layout; ?></h1></div>	
				<div id="div_usuario">
					<p class="txt_geral">Bem-vindo: 
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
					if ($usuarioGrupo == '1'){ // solicitante
						echo $this->renderElement($menu);
					}elseif ($usuarioGrupo == '2'){ // atendente
						echo $this->renderElement($menu);
					}elseif ($usuarioGrupo == '3'){ // administrador de area
						echo $this->renderElement($menu);
					}elseif ($usuarioGrupo == '4'){ // administrador geral
						echo $this->renderElement($menu);
					}
					
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