<?php
class UsuariosController extends AppController {

	var $name = 'Usuarios';
	var $helpers = array('Html', 'Form');
	
	function index() {
		$this->Usuario->recursive = 0;
		$this->set('usuarios', $this->paginate());
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
	
	function login(){
		pr($this->Auth);
	}
	
	function logout(){
		$this->redirect($this->Auth->logout());
	}
	
	function isAuthorized() {
		if ($this->Auth->user('nivel_de_permissao') == 1){
			if($this->action == 'edit'){
				$id = $this->params['pass'][0];
				if($this->Auth->user('id') == $id){

					return true	;
				}else{
					return false;
				}
			}elseif($this->action == 'delete' || $this->action == 'add'){
				return false;
			}

			return true;
		}elseif($this->Auth->user('nivel_de_permissao') == 2){
			return true;
		}else{
			return false;
		}
	}

}
?>