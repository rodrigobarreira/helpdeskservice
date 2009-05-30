<?php
/* SVN FILE: $Id: routes.php 7690 2008-10-02 04:56:53Z nate $ */
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage		cake.app.config
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 7690 $
 * @modifiedby		$LastChangedBy: nate $
 * @lastmodified	$Date: 2008-10-02 00:56:53 -0400 (Thu, 02 Oct 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'usuarios', 'action' => 'index', 'home'));
	
	
	
	Router::connect('/home/', array('controller' => 'vw_chamados', 'action' => 'meusChamados', 'home'));
	Router::connect('/home/meusChamados/*', array('controller' => 'vw_chamados', 'action' => 'meusChamados', ''));
	Router::connect('/home/abrirChamado', array('controller' => 'chamados', 'action' => 'abrirChamado', ''));
	Router::connect('/home/alterarSenha', array('controller' => 'usuarios', 'action' => 'alterarSenha', ''));
	Router::connect('/home/visualizarChamado/*', array('controller' => 'chamados', 'action' => 'view_home'));
	
	/* rotas para atendimento */
	Router::connect('/atendimento', array('controller' => 'vw_chamados', 'action' => 'chamadosAbertos', ''));
	Router::connect('/atendimento/chamadosAbertos/*', array('controller' => 'vw_chamados', 'action' => 'chamadosAbertos',''));
	Router::connect('/atendimento/chamadosEncerrados/*', array('controller' => 'vw_chamados', 'action' => 'chamadosEncerrados'));
	Router::connect('/atendimento/alterarChamado/*', array('controller' => 'chamados', 'action' => 'edit'));
	Router::connect('/atendimento/visualizarChamado/*', array('controller' => 'chamados', 'action' => 'view_atende'));
	Router::connect('/atendimento/atenderChamado/*', array('controller' => 'chamados', 'action' => 'atender'));
	
	/* rotas para administracao */
	Router::connect('/admin', array('controller' => 'usuarios', 'action' => 'add', ''));
	Router::connect('/admin/usuarios', array('controller' => 'usuarios', 'action' => 'index', ''));
	Router::connect('/admin/setor', array('controller'=>'setores','action'=>'index',''));
	Router::connect('/admin/grupos',array('controller'=>'grupos','action'=>'index',''));
	Router::connect('/admin/problemas',array('controller'=>'problemas','action'=>'index',''));
	//Router::connect('/admin/relatorio',array('controller'=>'relatorio','action'=>'index',''));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
/**
 * Then we connect url '/test' to our test controller. This is helpful in
 * developement.
 */
	Router::connect('/tests', array('controller' => 'tests', 'action' => 'index'));
?>