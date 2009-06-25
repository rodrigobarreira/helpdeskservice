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
				'(VwChamado.chamado_status_id = 1 or VwChamado.chamado_status_id = 3 or VwChamado.chamado_status_id = 6)',	
			);
		}elseif($this->usuarioGrupo == 2){
			$conditions = array (
				'VwChamado.solicitante_setor_id' => $this->usuarioSetor,
				'(VwChamado.chamado_status_id = 1 or VwChamado.chamado_status_id = 3 or VwChamado.chamado_status_id = 6)',
			);
		}
		
		$filtro = array();
		$campo = "";
		foreach ($this->passedArgs as $chave=>$valor){
			$campo = substr($chave, 4);
			// verifica se foi passado algum filtro como argumento
			// neste primeiro momento só será aceito um filtro
			if($chave == 'fil_remove' && $valor=='true'){
				$this->Session->del('ChamadosAbertosFiltro.filtro');
			}else{
				if(substr($chave, 0, 4) == 'fil_'){
					if(!is_numeric($valor)){
						//$filtro = array("VwChamado.chamado_titulo like '".$valor."%'");
						$filtro = array("VwChamado.".$campo. "like '".$valor."%'");
					}else{
						$filtro = array('VwChamado.'.$campo  => $valor);
					}
					$this->Session->write('ChamadosAbertosFiltro.filtro', $filtro);
					if($campo  == 'chamado_status_id'){
						$conditions = $filtro;
					}else{
						$conditions = array_merge($conditions,$filtro);
					}
					break;
				}
			}
		}
		//pr($conditions );
		if (count($filtro) == 0 ){
			if ($this->Session->read('ChamadosAbertosFiltro.filtro') && is_array($this->Session->read('ChamadosAbertosFiltro.filtro'))){
				$filtro =  $this->Session->read('ChamadosAbertosFiltro.filtro');
				if($campo  == 'chamado_status_id'){
					$conditions = $filtro;
				}else{
					$conditions = array_merge($conditions,$filtro);
				}
			}
		}
		
		if (isset($this->passedArgs['limit'])){
			// foi informado a quantidade de registros via combo
			$quantidade = $this->passedArgs['limit'];
			$this->Session->write('ChamadosAbertos.limit', $quantidade);
		}else{
			// não foi informado a quantidade de registro então pega da sessão
			//$this->Session->del('MeusChamados.limit');
			if ($this->Session->read('ChamadosAbertos.limit') && is_numeric($this->Session->read('ChamadosAbertos.limit'))){
				$quantidade =  $this->Session->read('ChamadosAbertos.limit');
			}else{
				// caso não seja ainda definido na seção
				$quantidade =  5;
				// grava na seção
				$this->Session->write('ChamadosAbertos.limit', $quantidade);
			}
		}


		//die();
		$this->paginate = array(
			'limit' =>$quantidade, 
			'conditions' => $conditions,
			'order' => array ('VwChamado.chamado_id DESC')
		);
		
		//$this->Chamado->recursive = 2;
		$this->set('vw_chamados', $this->paginate('VwChamado'));
		$this->set('quantidade', $quantidade);
		
		
	}

	/*
	 * Function Chamados Enderrados
	 * 
	 * 
	 */
	function chamadosEncerrados(){
		$this->pageTitle = "Chamados Encerrados";

		$conditions = array();
		if($this->usuarioGrupo == 5){

			// administrador geral
			$conditions = array (
				'(VwChamado.chamado_status_id =2 or VwChamado.chamado_status_id = 4 or VwChamado.chamado_status_id = 5)',	
			);
		}elseif($this->usuarioGrupo == 2){
			$conditions = array (
				'VwChamado.solicitante_setor_id' => $this->usuarioSetor,
				'VwChamado.chamado_status_id =2 or VwChamado.chamado_status_id = 4 or VwChamado.chamado_status_id = 5',
			);
		}
		
		$filtro = array();
		foreach ($this->passedArgs as $chave=>$valor){
			// verifica se foi passado algum filtro como argumento
			// neste primeiro momento só será aceito um filtro
			if($chave == 'fil_remove' && $valor=='true'){
				$this->Session->del('ChamadosEncerradosFiltro.filtro');
			}else{
				if(substr($chave, 0, 4) == 'fil_'){
					if(!is_numeric($valor)){
						//$filtro = array("VwChamado.chamado_titulo like '".$valor."%'");
						$filtro = array("VwChamado.".$campo. "like '".$valor."%'");
					}else{
						$filtro = array('VwChamado.'.substr($chave, 4) => $valor);
					}
					$this->Session->write('ChamadosEncerradosFiltro.filtro', $filtro);
					$conditions = array_merge($conditions,$filtro);
					break;
				}
			}
		}
		//pr($conditions );
		if (count($filtro) == 0 ){
			if ($this->Session->read('ChamadosEncerradosFiltro.filtro') && is_array($this->Session->read('ChamadosEncerradosFiltro.filtro'))){
				$filtro =  $this->Session->read('ChamadosEncerradosFiltro.filtro');
				$conditions = array_merge($conditions,$filtro);
			}
		}
		
		if (isset($this->passedArgs['limit'])){
			// foi informado a quantidade de registros via combo
			$quantidade = $this->passedArgs['limit'];
			$this->Session->write('ChamadosEncerrados.limit', $quantidade);
		}else{
			// não foi informado a quantidade de registro então pega da sessão
			//$this->Session->del('MeusChamados.limit');
			if ($this->Session->read('ChamadosEncerrados.limit') && is_numeric($this->Session->read('ChamadosEncerrados.limit'))){
				$quantidade =  $this->Session->read('ChamadosEncerrados.limit');
			}else{
				// caso não seja ainda definido na seção
				$quantidade =  5;
				// grava na seção
				$this->Session->write('ChamadosEncerrados.limit', $quantidade);
			}
		}


		//die();
		$this->paginate = array(
			'limit' =>$quantidade, 
			'conditions' => $conditions,
			'order' => array ('VwChamado.chamado_id DESC')
		);
		
		//$this->Chamado->recursive = 2;
		$this->set('vw_chamados', $this->paginate('VwChamado'));
		$this->set('quantidade', $quantidade);
	}

	/*
	 * Meus Chamados
	 * 
	 * 
	 */
	function meusChamados($status = null){
		$this->pageTitle = "Meus Chamados";

		if ($status != null){
			$conditions = array (
				'VwChamado.solicitante_id' => $this->usuarioId,
				'VwChamado.chamado_status_id' => $status,
				
			);
		}else{
			$conditions = array(
				'VwChamado.solicitante_id' => $this->usuarioId,
				
			);
		}
		//pr($this->passedArgs);
		$filtro = array();
		foreach ($this->passedArgs as $chave=>$valor){
			// verifica se foi passado algum filtro como argumento
			// neste primeiro momento só será aceito um filtro
			if($chave == 'fil_remove' && $valor=='true'){
				$this->Session->del('MeusChamadosFiltro.filtro');
			}else{
				if(substr($chave, 0, 4) == 'fil_'){
					if(!is_numeric($valor)){
						//$filtro = array("VwChamado.chamado_titulo like '".$valor."%'");
						$filtro = array("VwChamado.".$campo. "like '".$valor."%'");
					}else{
						$filtro = array('VwChamado.'.substr($chave, 4) => $valor);
					}
					$this->Session->write('MeusChamadosFiltro.filtro', $filtro);
					$conditions = array_merge($conditions,$filtro);
					break;
				}
			}
		}
		//pr($conditions );
		if (count($filtro) == 0 ){
			if ($this->Session->read('MeusChamadosFiltro.filtro') && is_array($this->Session->read('MeusChamadosFiltro.filtro'))){
				$filtro =  $this->Session->read('MeusChamadosFiltro.filtro');
				$conditions = array_merge($conditions,$filtro);
			}
		}
		
		if (isset($this->passedArgs['limit'])){
			// foi informado a quantidade de registros via combo
			$quantidade = $this->passedArgs['limit'];
			$this->Session->write('MeusChamados.limit', $quantidade);
		}else{
			// não foi informado a quantidade de registro então pega da sessão
			//$this->Session->del('MeusChamados.limit');
			if ($this->Session->read('MeusChamados.limit') && is_numeric($this->Session->read('MeusChamados.limit'))){
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
		//$this->set('status', $this->Status->find('list'));
		//$result  = $this->paginate();
		$this->set('vw_chamados', $this->paginate('VwChamado'));
		//pr($this->paginate());
		$this->set('quantidade', $quantidade);
	}

	/*
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
		 header("Content-type: text/xml");
		$xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
		$xml .= "<rows>";
		$xml .= "<page>$page</page>";
		$xml .= "<total>$total</total>";
		/*$json = "";
		 $json .= "{\n";
		 $json .= "page: $page,\n";
		 $json .= "total: $total,\n";
		 $json .= "rows: [";
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
			 $json .= "}";
			$rc = true;
		}

		$xml .= "</rows>";
		/*$json .= "]\n";
		 $json .= "}";

		$this->set('grid_chamados', $xml);
	}*/


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
		$this->pageTitle = "Visualização de Chamado";
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
				//'Status.id <> 3'
				)
				));
				$this->set(compact('chamado', 'usuarios', 'areas', 'problemas', 'historicos', 'status'));

	}




}
?>