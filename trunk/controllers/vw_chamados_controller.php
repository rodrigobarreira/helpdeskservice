<?php
class VwChamadosController extends AppController {

	var $name = 'VwChamados';
	var $uses = array ('VwChamado', 'ChamadoHistorico', 'Setor', 'Chamado', 'Status');
	var $helpers = array ('xml');
	
	function index() {
		$this->VwChamado->recursive = 0;
		$this->set('vwChamados', $this->paginate());
	}

	function chamadosAbertos(){
		$this->pageTitle = "Chamados Abertos";

		$conditions = array();

		if($this->usuarioGrupo == 5){
			// administrador geral
			$conditions = array (
				'VwChamado.chamado_status_id = 1 or VwChamado.chamado_status_id = 3 or VwChamado.chamado_status_id = 6',	
			);
		}elseif($this->usuarioGrupo == 2){
			$conditions = array (
				'VwChamado.solicitante_setor_id' => $this->usuarioSetor,
				'VwChamado.chamado_status_id = 1 or VwChamado.chamado_status_id = 3 or VwChamado.chamado_status_id = 6',
			);
		}
		$this->paginate = array(
			'limit' => 5, 
			'conditions' => $conditions,
			'recursive' => -1,
			'order' => array ('VwChamado.chamado_id DESC')
		);


		//$this->Chamado->recursive = 2;
		$this->set('chamados', $this->paginate());
			
	}

	function chamadosEncerrados(){
		$this->pageTitle = "Chamados Encerrados";

		$conditions = array();
		if($this->usuarioGrupo == 5){

			// administrador geral
			$conditions = array (
				'VwChamado.chamado_status_id =2 or VwChamado.chamado_status_id = 4 or VwChamado.chamado_status_id = 5',	
			);
		}elseif($this->usuarioGrupo == 2){
			$conditions = array (
				'VwChamado.solicitante_setor_id' => $this->usuarioSetor,
				'VwChamado.chamado_status_id =2 or VwChamado.chamado_status_id = 4 or VwChamado.chamado_status_id = 5',
			);
		}
		$this->paginate = array(
			'limit' => 5, 
			'conditions' => $conditions,
			'recursive' => -1,
			'order' => array ('VwChamado.chamado_id DESC')
		);


		//$this->Chamado->recursive = 2;
		$this->set('chamados', $this->paginate());

	}

	function meusChamados($status = null){
		$this->pageTitle = "Meus Chamados";
		
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
		
		if (isset($this->passedArgs['limit'])){
			// foi informado a quantidade de registros via combo
			$quantidade = $this->passedArgs['limit'];
			$this->Session->write('MeusChamados.limit', $quantidade);
		}else{
			// não foi informado a quantidade de registro então pega da sessão
			if ($this->Session->read('MeusChamados.limit')){
				$quantidade =  $this->Session->read('MeusChamados.limit');	
			}else{
				// caso não seja ainda definido na seção
				$quantidade =  5;
				// grava na seção
				$this->Session->write('MeusChamados.limit', $quantidade);		
			}
		}
		
		
		//die();
		$this->paginate = array(
			'limit' =>$quantidade, 
			'conditions' => $conditions,
		);


		//$this->Chamado->recursive = 1;
		$this->set('status', $this->Status->find('list'));
		$this->set('vw_chamados', $this->paginate());
		//pr($this->paginate());
		$this->set('quantidade', $quantidade);
	}

	function gridMeusChamados($id = null){
		//pr($this);
		if($id){
			die("EW");
		}
		$this->pageTitle = "Meus Chamados";
		$this->layout = 'xml/default';
		//$this->layout = 'json';
		//pr($this->params);
		
		//$this->Chamado->Problema->unbindModel( array('hasMany' => array('Chamado')) );

		@$page = $_POST['page'];
		@$rp = $_POST['rp'];
		@$sortname = $_POST['sortname'];
		@$sortorder = $_POST['sortorder'];

		if (!$sortname) $sortname = 'solicitante_nome';
		if (!$sortorder) $sortorder = 'desc';

		$sort = $sortname." ".$sortorder;

		if (!$page) $page = 1;
		if (!$rp) $rp = 10;

		$start = (($page-1) * $rp);

		//$limit = "LIMIT $start, $rp";
		$limit = $rp;

		$sql = "SELECT iso,name,printable_name,iso3,numcode FROM country $sort $limit";
		$result = $this->VwChamado->find('all');

		$total = $this->VwChamado->find('count');

		/*header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" );
		header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" );
		header("Cache-Control: no-cache, must-revalidate" );
		header("Pragma: no-cache" );
		header("Content-type: text/xml");*/
		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		$xml .= "<rows>";
		$xml .= "<page>$page</page>";
		$xml .= "<total>$total</total>";
		/*$json = "";
		$json .= "{\n";
		$json .= "page: $page,\n";
		$json .= "total: $total,\n";
		$json .= "rows: [";*/
		$rc = false;
		//pr($result);
		//die();
		//($row = mysql_fetch_array($result)) {
		foreach($result as $row){
			$row = $row['VwChamado'];
			$xml .= "<row id='".$row['chamado_id']."'>";
			$xml .= "<cell><![CDATA[".$row['chamado_id']."]]></cell>";
			$xml .= "<cell><![CDATA[".utf8_encode($row['solicitante_id'])."]]></cell>";
			$xml .= "<cell><![CDATA[".utf8_encode($row['solicitante_nome'])."]]></cell>";
			$xml .= "<cell><![CDATA[".utf8_encode($row['solicitante_setor_id'])."]]></cell>";
			$xml .= "<cell><![CDATA[".utf8_encode($row['solicitante_setor_nome'])."]]></cell>";
			$xml .= "</row>";
			/*
			if ($rc) $json .= ",";
			$json .= "\n{";
			$json .= "id:'".$row['VwChamado']['chamado_id']."',";
			$json .= "cell:['".$row['VwChamado']['chamado_id']."'";
			$json .= ",'".addslashes($row['VwChamado']['solicitante_id'])."'";
			$json .= ",'".addslashes($row['VwChamado']['solicitante_nome'])."'";
			$json .= ",'".addslashes($row['VwChamado']['solicitante_setor_id'])."'";
			$json .= ",'".addslashes($row['VwChamado']['solicitante_setor_nome'])."']";
			$json .= "}";*/
			$rc = true; 
		}

		$xml .= "</rows>";
		/*$json .= "]\n";
		$json .= "}";*/
		
		$this->set('grid_chamados', $xml);
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