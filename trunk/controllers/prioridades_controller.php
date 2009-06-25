<?php
class PrioridadesController extends AppController {

	var $name = 'Prioridades';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Prioridade->recursive = 0;
		$this->set('prioridades', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Prioridade.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('prioridade', $this->Prioridade->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Prioridade->create();
			if ($this->Prioridade->save($this->data)) {
				$this->Session->setFlash(__('The Prioridade has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Prioridade could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Prioridade', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Prioridade->save($this->data)) {
				$this->Session->setFlash(__('The Prioridade has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Prioridade could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Prioridade->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Prioridade', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Prioridade->del($id)) {
			$this->Session->setFlash(__('Prioridade deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function getPrioridades(){
		$this->layout = 'ajax';
		$this->set('dados', $this->Prioridade->find('list', array(
			'order' => 'tempo ASC'
			)));
	}
}
?>