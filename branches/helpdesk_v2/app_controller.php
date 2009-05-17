<?php
/* SVN FILE: $Id: app_controller.php 6311 2008-01-02 06:33:52Z phpnut $ */
/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @subpackage		cake.app
 * @since			CakePHP(tm) v 0.2.9
 * @version			$Revision: 6311 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2008-01-02 01:33:52 -0500 (Wed, 02 Jan 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Short description for class.
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		cake
 * @subpackage	cake.app
 */
class AppController extends Controller {
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Paginator', 'Time');
	var $components = array (
		// componente para login e autorização de funções	
		'Auth',
		// componente para controle de Sessão
		'Session'
	);
	
// vari�veis para serem utilizadas na view ou nos controllers subsequente
	protected $usuarioId;
	protected $usuarioNome;
	protected $usuarioGrupo;
	protected $menu = 'menu_home';
		 
	function beforeFilter() {		
		// informa ao cake que a aplicação utilizar� o sistema lingua pt_br
		Configure :: write('Config.language', "pt_br");

		// especifica que cada controladora implementar� as regras de acesso as funções (actions)
		$this->Auth->authorize = 'controller';
		
		// informa ao cake qual modelo (tabela) conter� os dados de login
		$this->Auth->userModel = 'Usuario';
		
		// informa ao cake quais campos da tabela ser� utilizado para conferir o login e senha
		$this->Auth->fields = array (
			'username' => 'matricula',
			'password' => 'senha'
		);
		
		// vari�vel que restringe somente os usu�rios ativos poderão efetuar o login
		$this->Auth->userScope = array('Usuario.ativo' => '1');
		
		// caso ocorra algum erro de login "ser� exibido" a mensagem
		$this->Auth->loginError = __("Usuario n�o encontrado.", true);

		// informa qual a função de login
		$this->Auth->loginAction = array (
			'controller' => 'usuarios',
			'action' => 'login'
		);
		
		// informa para qual p�gina redirecionar ap�s o sucesso do login
		$this->Auth->loginRedirect = array (
			'controller' => 'chamados',
			'action' => 'index'
		);
		
		// "exibe a mensagem" de acesso negado a alguma funcionalidade do sistema
		$this->Auth->authError = "Sem permiss�o para a fun��o desejada.";
		
		$this->Auth->autoRedirect = true;
		
		$this->usuarioId = $this->Auth->user('id');
		$this->usuarioMatricula = $this->Auth->user('matricula');
		$this->usuarioNome = $this->Auth->user('nome');
		$this->usuarioGrupo = $this->Auth->user('grupo_id');
		
		$this->set('usuarioId', $this->usuarioId);
		$this->set('usuarioNome', $this->usuarioNome);
		$this->set('usuarioGrupo', $this->usuarioGrupo);
		
		
		//$this->log("isAuthorized", LOG_DEBUG);
		
		$this->set('menu', $this->menu);
				
	}

	function isAuthorized() {
		
		return true;

	}
}
?>