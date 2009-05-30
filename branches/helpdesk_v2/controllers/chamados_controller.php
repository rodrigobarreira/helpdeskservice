<?php
class ChamadosController extends AppController {

	var $name = 'Chamados';
	//var $helpers = array('Html', 'Form'); 
	var $uses = array('Chamado', 'Setor', 'Problema', 'ChamadoHistorico');

	function index() {
		/*s$this->paginate = array('limit' => 5, 
				'where' => "usuario_id = '$this->usuarioId'");
		$this->Chamado->recursive = 1;
		$this->set('chamados', $this->paginate());*/
		$this->redirect('/home/meusChamados');
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Chamado.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$chamado = $this->Chamado->read(null, $id);
		$setor = $this->Setor->read(null, $chamado['Problema']['setor_id']);
		$historicos = $this->ChamadoHistorico->find('all', array(
				'conditions' => array ('ChamadoHistorico.chamado_id' => $id),
				'order' => 'ChamadoHistorico.id DESC'
		));
		$this->set(compact('chamado', 'setor', 'historicos'));
	}
	
	var $recursive = 1;
	
	function abrirChamado() {
		//pr($this);
		$this->pageTitle = "Abertura de Chamado";
		if (!empty($this->data)) {
			$this->Chamado->create();
			if ($this->Chamado->save($this->data)) {
				$this->Session->setFlash(__('The Chamado has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Chamado could not be saved. Please, try again.', true));
			}
		}
		$this->Setor->recursive = 1;
		
		
		$areas = $this->Setor->find('list', array (
			'order' => 'Setor.descricao ASC',
			'conditions' => array (
				'Setor.atende_chamado' => 1)
		));
		
		//$usuarios = $this->Chamado->Usuario->find('list');
		$problemas = $this->Chamado->Problema->find('list');
		$status = $this->Chamado->Status->find('list');
		$responsaveis = $this->Chamado->Responsavel->find('list');
		$this->set(compact('problemas', 'usuarios', 'status', 'responsaveis', 'areas'));
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
		$problemas = $this->Chamado->Problema->find('list');
		$usuarios = $this->Chamado->Usuario->find('list');
		$status = $this->Chamado->Status->find('list');
		$responsaveis = $this->Chamado->Responsavel->find('list');
		$this->set(compact('problemas','usuarios','status','responsaveis'));
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
	
	/*
	 * Lista todos os chamados do usu�rio solicitante
	 * 
	 */
	function meusChamados(){
		$this->pageTitle = "Meus Chamados";
		$this->paginate = array(
			'limit' => 5, 
			'conditions' => array (
				'Chamado.usuario_id' => $this->usuarioId,
			)
		);
		$this->Chamado->recursive = 2;
		$this->set('chamados', $this->paginate());
	}
	
	function ajaxListaProblemaPorArea($codigoArea){
		
		$this->layout = 'ajax';
		$problemas = $this->Problema->find('list', array (
			'order' => 'Problema.descricao ASC',
			'conditions' => array (
				'Problema.setor_id' => $codigoArea)
		));
		$this->set('problemas', $problemas);
		//echo $problemas;
	}
}
?>