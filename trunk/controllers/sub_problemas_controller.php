<?php
class SubProblemasController extends AppController {

	var $name = 'SubProblemas';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->SubProblema->recursive = 0;
		$this->set('subProblemas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid SubProblema.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('subProblema', $this->SubProblema->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SubProblema->create();
			if ($this->SubProblema->save($this->data)) {
				$this->Session->setFlash(__('The SubProblema has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The SubProblema could not be saved. Please, try again.', true));
			}
		}
		$problemas = $this->SubProblema->Problema->find('list');
		$this->set(compact('problemas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid SubProblema', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->SubProblema->save($this->data)) {
				$this->Session->setFlash(__('The SubProblema has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The SubProblema could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SubProblema->read(null, $id);
		}
		$problemas = $this->SubProblema->Problema->find('list');
		$this->set(compact('problemas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for SubProblema', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SubProblema->del($id)) {
			$this->Session->setFlash(__('SubProblema deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>