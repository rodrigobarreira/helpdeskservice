<?php
class AppController extends Controller{
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Paginator');
	var $components = array('Session', 'Auth');
	
	function beforeFilter() {

		Configure :: write('Config.language', "pt_br");

		$this->Auth->authorize = 'controller';

		$this->Auth->userModel = 'Usuario';
		$this->Auth->fields = array (
			'username' => 'matricula',
			'password' => 'senha'
		);

		$this->Auth->loginError = __("Usuario nao encontrado", true);

		$this->Auth->loginAction = array (
			'controller' => 'usuarios',
			'action' => 'login'
		);
		$this->Auth->loginRedirect = array (
			'controller' => 'usuarios',
			'action' => 'index'
		);

		$this->Auth->authError = "Sem permiss&atilde;o para a funç&atilde;o desejada.";
		$this->set('usuarioAtual', $this->Auth->user('id'));
		$this->set('nivelDePermissao', $this->Auth->user('nivel_de_permissao'));
	}

	function isAuthorized() {

		return true;

	}
	
}
?>