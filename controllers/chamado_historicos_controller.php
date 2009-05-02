<?php
class ChamadoHistoricosController extends AppController {

	var $name = 'ChamadoHistoricos';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->ChamadoHistorico->recursive = 0;
		$this->set('chamadoHistoricos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ChamadoHistorico.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('chamadoHistorico', $this->ChamadoHistorico->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ChamadoHistorico->create();
			if ($this->ChamadoHistorico->save($this->data)) {
				$this->Session->setFlash(__('The ChamadoHistorico has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ChamadoHistorico could not be saved. Please, try again.', true));
			}
		}
		$chamados = $this->ChamadoHistorico->Chamado->find('list');
		$usuarios = $this->ChamadoHistorico->Usuario->find('list');
		$this->set(compact('chamados', 'usuarios'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ChamadoHistorico', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->ChamadoHistorico->save($this->data)) {
				$this->Session->setFlash(__('The ChamadoHistorico has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The ChamadoHistorico could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ChamadoHistorico->read(null, $id);
		}
		$chamados = $this->ChamadoHistorico->Chamado->find('list');
		$usuarios = $this->ChamadoHistorico->Usuario->find('list');
		$this->set(compact('chamados','usuarios'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ChamadoHistorico', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ChamadoHistorico->del($id)) {
			$this->Session->setFlash(__('ChamadoHistorico deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>