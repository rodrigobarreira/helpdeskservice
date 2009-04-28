<?php
class GruposController extends AppController {

	var $name = 'Grupos';
	var $uses = 'Grupo';
	
	var $helpers = array('Html', 'Form');
	var $paginate = array('limit' => 10);

	function index() {
		$this->Grupo->recursive = 0;
		$this->set('grupos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Grupo.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('grupo', $this->Grupo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Grupo->create();
			if ($this->Grupo->save($this->data)) {
				$this->Session->setFlash(__('The Grupo has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Grupo could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Grupo', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Grupo->save($this->data)) {
				$this->Session->setFlash(__('The Grupo has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Grupo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Grupo->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Grupo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Grupo->del($id)) {
			$this->Session->setFlash(__('Grupo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function beforeFiler(){
		parent::beforeFilter();
		
		$this->Auth->allow('');
	}
	// permite você fazer mais algumas verificações de autenticação	
	function isAuthorized() {
		$retorno = false;
		switch ($this->Auth->user('grupo_id')){
			case 1: // solicitante
				break;
			case 2: // atendente
				break;
			case 3: // administrador 
				$retorno = false;
				break;	
			default:
				break;
		}

				return $retorno;
	}

}
?>