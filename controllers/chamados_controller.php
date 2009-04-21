<?php
class ChamadosController extends AppController {

	var $name = 'Chamados';
	var $paginate = array('limit' => 10, 'fields' => array(
					// campos do resultado
					'Chamado.id', 
					'Chamado.data_abertura',
					'Chamado.hora_abertura',
					'Chamado.descricao_problema',
					'Prioridade.descricao',
					'Status.descricao'
				)); 

	function index() {
		$this->Chamado->recursive = 0;
		$this->set('chamados', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Chamado.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('chamado', $this->Chamado->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Chamado->create();
			if ($this->Chamado->save($this->data)) {
				$this->Session->setFlash(__('The Chamado has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Chamado could not be saved. Please, try again.', true));
			}
		}
		$subProblemas = $this->Chamado->SubProblema->find('list');
		$usuarios = $this->Chamado->Usuario->find('list');
		$prioridades = $this->Chamado->Prioridade->find('list');
		$status = $this->Chamado->Status->find('list');
		$responsaveis = $this->Chamado->Responsavel->find('list');
		$this->set(compact('subProblemas', 'usuarios', 'prioridades', 'status', 'responsaveis'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Chamado', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Chamado->save($this->data)) {
				$this->Session->setFlash(__('The Chamado has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Chamado could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Chamado->read(null, $id);
		}
		$subProblemas = $this->Chamado->SubProblema->find('list');
		$usuarios = $this->Chamado->Usuario->find('list');
		$prioridades = $this->Chamado->Prioridade->find('list');
		$status = $this->Chamado->Status->find('list');
		$responsaveis = $this->Chamado->Responsavel->find('list');
		$this->set(compact('subProblemas','usuarios','prioridades','status','responsaveis'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Chamado', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Chamado->del($id)) {
			$this->Session->setFlash(__('Chamado deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	// função que lista os chamados de um determinado solicitante
	function listaChamados($usuarioId = null){
		
		if ($usuarioId == null){
			$usuarioId = $this->Auth->user('id');
		}
		
		$this->Chamado->recursive = 1;
		
		$this->set(
			'chamados', 
			$this->paginate('Chamado', array(
				array('Chamado.usuario_id' => $usuarioId),
				
			))			
		);
	}

}
?>