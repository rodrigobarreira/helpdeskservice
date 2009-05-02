<?php
class AvaliacoesController extends AppController {

	var $name = 'Avaliacoes';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->Avaliacao->recursive = 0;
		$this->set('avaliacoes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Avaliacao.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('avaliacao', $this->Avaliacao->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Avaliacao->create();
			if ($this->Avaliacao->save($this->data)) {
				$this->Session->setFlash(__('The Avaliacao has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Avaliacao could not be saved. Please, try again.', true));
			}
		}
		$chamados = $this->Avaliacao->Chamado->find('list');
		$this->set(compact('chamados'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Avaliacao', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Avaliacao->save($this->data)) {
				$this->Session->setFlash(__('The Avaliacao has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Avaliacao could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Avaliacao->read(null, $id);
		}
		$chamados = $this->Avaliacao->Chamado->find('list');
		$this->set(compact('chamados'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Avaliacao', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Avaliacao->del($id)) {
			$this->Session->setFlash(__('Avaliacao deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>