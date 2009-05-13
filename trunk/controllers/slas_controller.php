<?php
class SlasController extends AppController {

	var $name = 'Slas';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Sla->recursive = 0;
		$this->set('slas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Sla.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('sla', $this->Sla->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Sla->create();
			if ($this->Sla->save($this->data)) {
				$this->Session->setFlash(__('The Sla has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Sla could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Sla', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Sla->save($this->data)) {
				$this->Session->setFlash(__('The Sla has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Sla could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Sla->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Sla', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Sla->del($id)) {
			$this->Session->setFlash(__('Sla deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>