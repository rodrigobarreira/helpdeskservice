<?php
class VwChamadosController extends AppController {

	var $name = 'VwChamados';
	var $helpers = array('Html', 'Form');

	function index() {
		$this->VwChamado->recursive = 0;
		$this->set('vwChamados', $this->paginate());
	}
	
	function chamadosAbertos(){
		$this->pageTitle = "Chamados Abertos";
		 
		$this->paginate = array(
			'limit' => 5, 
			'conditions' => array (
				'VwChamado.setor_id' => $this->usuarioSetor,
				'VwChamado.status_id <> 4',
			),
			'recursive' => -1
		);
		
		
		//$this->Chamado->recursive = 2;
		$this->set('chamados', $this->paginate());
		 
	}
	
	function chamadosEncerrados(){
		$this->pageTitle = "Chamados Encerrados";
		
		$this->paginate = array(
			'limit' => 5, 
			'conditions' => array (
				'VwChamado.setor_id' => $this->usuarioSetor,
				'VwChamado.status_id' => 4,
			),
			'recursive' => 2
		);
		
		
		//$this->Chamado->recursive = 2;
		$this->set('chamados', $this->paginate());
	
	}
	
}
?>