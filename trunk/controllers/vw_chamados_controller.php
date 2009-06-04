<?php
class VwChamadosController extends AppController {

	var $name = 'VwChamados';
	var $uses = array ('VwChamado', 'ChamadoHistorico', 'Setor', 'Chamado', 'Status');
	
	function index() {
		$this->VwChamado->recursive = 0;
		$this->set('vwChamados', $this->paginate());
	}
	
	function chamadosAbertos(){
		$this->pageTitle = "Chamados Abertos";
		 
		$this->paginate = array(
			'limit' => 5, 
			'conditions' => array (
				'VwChamado.solicitante_setor_id' => $this->usuarioSetor,
				'VwChamado.chamado_status_id <> 4',
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
				'VwChamado.solicitante_setor_id' => $this->usuarioSetor,
				'VwChamado.chamado_status_id' => 4,
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
				'VwChamado.chamado_status_id' => $status
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
	function pesquisar(){
		$this->pageTitle = "Pesquisar Chamados";
		/*pesquisar por problema, e/ou solicitante ou/e data
		 * 
		 */$this->paginate = array(
			'limit' => 5, 
			'conditions' => array (
				'VwChamado.setor_id' => $this->usuarioSetor,
				'VwChamado.status_id' => 4,
			),
			'recursive' => 2
		);
		/**/
	}
	
	// mostra um chamado específico
	function view_atende($id = null) {
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid Chamado.', true));
			$this->redirect(array('controller' => 'atendimento', 'action'=>'index'));
		}
		
		$chamado = $this->VwChamado->read(null, $id);
		//$setor = $this->Setor->read(null, $chamado['Problema']['setor_id']);
		$historicos = $this->ChamadoHistorico->find('all', array(
				'conditions' => array ('ChamadoHistorico.chamado_id' => $id),
				'order' => 'ChamadoHistorico.id DESC'
		));
		$this->set(compact('chamado', 'historicos'));
	}
	
	function atenderChamado($id){
		if (!$id) {
			$this->Session->setFlash(__('Invalid Chamado.', true));
			$this->redirect(array('controller' => 'atendimento', 'action'=>'index'));
		}
		
		$chamado = $this->VwChamado->read(null, $id);
		//$setor = $this->Setor->read(null, $chamado['Problema']['setor_id']);
		$historicos = $this->ChamadoHistorico->find('all', array(
				'conditions' => array ('ChamadoHistorico.chamado_id' => $id),
				'order' => 'ChamadoHistorico.id DESC'
		));
		$areas = $this->Setor->find('list', array (
			'order' => 'Setor.descricao ASC',
			'conditions' => array (
				'Setor.atende_chamado' => 1)
		));
		
		//$usuarios = $this->Chamado->Usuario->find('list');
		$problemas = $this->Chamado->Problema->find('list', array(
			'conditions' => array(
				'Problema.setor_id' => $chamado['VwChamado']['problema_tipo_area_id']
			)
		));
		
		$status = $this->Status->find('list', array (
			'order' => 'Status.descricao ASC',
			'conditions' => array (
				'Status.id <> 3')
		)); 
		$this->set(compact('chamado', 'usuarios', 'areas', 'problemas', 'historicos', 'status'));
				
	}
	
	
	
	
}
?>