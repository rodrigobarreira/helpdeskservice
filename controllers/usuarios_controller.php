<?php
class UsuariosController extends AppController {

	var $name = 'Usuarios';
	var $helpers = array('Html', 'Form');

	function index() {
	// verifica se o usuário está autenticado
		if(!$this->Auth->user('id')){
			// não está autenticado
			//$this->log("array('controller'=>'usuarios', 'action'=> 'login'", LOG_DEBUG);
			$this->redirect(array('controller'=>'usuarios', 'action'=> 'login'));
		}else{
			//$this->log("array('controller'=>'chamados', 'action'=> 'index'", LOG_DEBUG);
			$this->redirect(array('controller'=>'chamados', 'action'=> 'index'));
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Usuario.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->data)) {
				$this->Session->setFlash(__('The Usuario has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Usuario could not be saved. Please, try again.', true));
			}
		}
		$grupos = $this->Usuario->Grupo->find('list');
		$setores = $this->Usuario->Setor->find('list');
		$this->set(compact('grupos', 'setores'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Usuario', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Usuario->save($this->data)) {
				$this->Session->setFlash(__('The Usuario has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Usuario could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Usuario->read(null, $id);
		}
		$grupos = $this->Usuario->Grupo->find('list');
		$setores = $this->Usuario->Setor->find('list');
		$this->set(compact('grupos','setores'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Usuario', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Usuario->del($id)) {
			$this->Session->setFlash(__('Usuario deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	/* função que altera a senha atual do usuário
	 * deve ser informada a senha atual e a nova senha
	 * sendo a nova senha deve ser informada duas vezes
	 * para verificação da mesma
	 */
	function alterarSenha(){
		// verifica se foi informado o campo senha atual
		if ($this->data['Usuario']['senha_atual'] == null){
			$this->Session->setFlash('Informe a senha atual.');
		}elseif($this->data['Usuario']['senha_nova'] == null){
			$this->Session->setFlash('Informe a nova senha.');
		}elseif($this->data['Usuario']['senha_confirmar'] == null){
			$this->Session->setFlash('Informe a senha de confirmação.');
		}else{
			// apllica-se a função de hash na senha atual informada
			//$this->
			
			
		}
		//pr($this->data);
	}
	
	function login(){
		$this->layout = 'login';
		//$this->redirect(array('controller' => 'chamados', 'actions' => 'index'));	
		
	}
	
	function logout(){
		$this->redirect($this->Auth->logout());
	}
	
	function beforeFilter(){
		
		parent::beforeFilter();
		$this->Auth->allow('index', 'login', 'add');
		
	}
	
	function isAuthorized() {
		return true;
	}

}
?>