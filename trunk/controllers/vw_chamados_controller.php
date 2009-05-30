<?php
class VwChamadosController extends AppController {

	var $name = 'VwChamados';
	var $uses = array ('VwChamado');
	
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
	
	function meusChamados($quantidade = 5, $status = null){
		$this->pageTitle = "Meus Chamados";
		//$this->layout = 'ajax';
		//pr($this->paginate);	
		//$this->Chamado->Problema->unbindModel( array('hasMany' => array('Chamado')) );
		
		if ($status != null){
			$conditions = array (
				'VwChamado.solicitante_id' => $this->usuarioId,
				'VwChamado.status_id' => $status
			);
		}else{
			$conditions = array(
				'VwChamado.solicitante_id' => $this->usuarioId,
			);
		}
		if ($quantidade < 1 || empty($quantidade)){
			$quantidade = 5;
		} 
		$this->paginate = array(
			'limit' => $quantidade, 
			'conditions' => $conditions,
		);
		
		
		//$this->Chamado->recursive = 1;
		$this->set('vw_chamados', $this->paginate());
		//pr($this->paginate());
	}
	
}
?>