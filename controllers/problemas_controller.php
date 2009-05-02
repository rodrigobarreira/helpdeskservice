<?php
class ProblemasController extends AppController {

	var $name = 'Problemas';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Problema->recursive = 0;
		$this->set('problemas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Problema.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('problema', $this->Problema->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Problema->create();
			if ($this->Problema->save($this->data)) {
				$this->Session->setFlash(__('The Problema has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Problema could not be saved. Please, try again.', true));
			}
		}
		$slas = $this->Problema->Sla->find('list');
		$setores = $this->Problema->Setor->find('list');
		$this->set(compact('slas', 'setores'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Problema', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Problema->save($this->data)) {
				$this->Session->setFlash(__('The Problema has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Problema could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Problema->read(null, $id);
		}
		$slas = $this->Problema->Sla->find('list');
		$setores = $this->Problema->Setor->find('list');
		$this->set(compact('slas','setores'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Problema', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Problema->del($id)) {
			$this->Session->setFlash(__('Problema deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>