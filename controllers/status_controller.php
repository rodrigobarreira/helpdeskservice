<?php
class StatusController extends AppController {

	var $name = 'Status';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Status->recursive = 0;
		$this->set('status', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Status.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('status', $this->Status->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Status->create();
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash(__('The Status has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Status could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Status', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Status->save($this->data)) {
				$this->Session->setFlash(__('The Status has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Status could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Status->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Status', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Status->del($id)) {
			$this->Session->setFlash(__('Status deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function getStatus(){
		$this->set('status', $this->Status->find('list', array(
			'order' => 'descricao ASC'
			)));
	}

}
?>