<?php
class SetoresController extends AppController {

	var $name = 'Setores';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Setor->recursive = 0;
		$this->set('setores', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Setor.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('setor', $this->Setor->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Setor->create();
			if ($this->Setor->save($this->data)) {
				$this->Session->setFlash(__('The Setor has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Setor could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Setor', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Setor->save($this->data)) {
				$this->Session->setFlash(__('The Setor has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Setor could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Setor->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Setor', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Setor->del($id)) {
			$this->Session->setFlash(__('Setor deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>