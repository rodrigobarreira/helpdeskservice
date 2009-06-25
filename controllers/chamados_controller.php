<?php
class ChamadosController extends AppController {

	var $name = 'Chamados';
	//var $helpers = array('Html', 'Form');
	//var $uses = array('Chamado', 'Setor', 'Problema', 'ChamadoHistorico', 'Prioridade', 'Usuario');
	//var $helpers = array ('Ajax');
	var $uses = array('Chamado', 'Setor', 'ChamadoHistorico', 'Problema' , 'Prioridade');
	//var $persistModel = true;
	function index() {
		/*s$this->paginate = array('limit' => 5,
			$this->set('menu', $this->menu);	'where' => "usuario_id = '$this->usuarioId'");
			$this->Chamado->recurunsive = 1;
			$this->set('chamados', $this->paginate());*/
		$this->redirect('/home/meusChamados');
	}

	function view_home($id = null) {
		$this->pageTitle = "Visualização de Chamado";
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
		$status = $this->Chamado->Status->find('first', array(
			'conditions' => array(
				'Status.id' => $this->configuracao['status_abertura'] 
		),
			
		));

		$this->pageTitle = "Abertura de Chamado";
		if (!empty($this->data)) {
			$this->Chamado->create();
				
			//if($this->data['Chamado']['data_hora_abertura']){
			/*/ formata a data para o formato americano ou seja do banco
				/$data_brasil = substr($this->data['Chamado']['data_hora_abertura'], 0, 10);
				$data_brasil_array = explode("-", $data_brasil);
				$data_americana = $data_brasil_array[2]."-".$data_brasil_array[1]."-".$data_brasil_array[0];
				// complementa com as horas
				$data_americana = $data_americana.substr($this->data['Chamado']['data_hora_abertura'], 10, 9);*/
			$this->data['Chamado']['data_hora_abertura'] = date('Y-m-d H:i:s');
			$this->data['Chamado']['status_id'] = $status['Status']['id'];
			//}
				
			if ($this->Chamado->save($this->data)) {
				$this->Session->setFlash(__('Seu chamado foi registrado com sucesso.', true), 'default', array('class' => 'messageSucess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Não foi possível registrar seu Chamado. Corrija os campos marcados e tente novamente.', 'default', array('class' => 'message'));
				//$this->redirect(array('../../home/abrirChamado'));

				$problemas = $this->Problema->find('list', array (
					'order' => 'Problema.descricao ASC',
					'conditions' => array (
						'Problema.setor_id' => $this->data['Chamado']['setor_id'])
				));
				//pr($problemas);
				$this->set('problemas', $problemas);
			}
		}
		$this->Setor->recursive = 1;


		$areas = $this->Setor->find('list', array (
			'order' => 'Setor.descricao ASC',
			'conditions' => array (
				'Setor.atende_chamado' => 1)
		));

		//$usuarios = $this->Chamado->Usuario->find('list');
		//$problemas = $this->Chamado->Problema->find('list');


		$responsaveis = $this->Chamado->Responsavel->find('list');
		$this->set(compact('usuarios', 'responsaveis', 'areas'));
		//$this->render('abrirChamado');
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Chamado', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			//pr($this->data);
			//pr($this->ChamadoHistorico);
			//if (!empty($this->data['ChamadoHistorico']['descricao'])){
				if(empty($this->data['Chamado']['responsavel_id'])){
					$this->data['Chamado']['responsavel_id'] = $this->usuarioId;
				}
				if ($this->ChamadoHistorico->saveAll($this->data)) {
					$this->Session->setFlash(__('Chamado atendido com sucesso.', true), 'default', array('class' => 'messageSucess'));
					$this->redirect(array('controller' => 'atendimento', 'action'=>'chamadosAbertos'));
				} else {
					//die();
					$this->Session->setFlash(__('Erro ao salvar o chamado.', true));
					//pr($this->Session);
					//die();
					$this->redirect(array('controller' => 'atendimento', 'action'=>'atenderChamado', $id));
					//$this->render('../../atendimento/atenderChamado'.$id);
				}
			//}///else{
				//$this->Session->setFlash('Erro ao salvar o chamado!');
				//$this->redirect(array('controller' => 'atendimento', 'action'=>'atenderChamado', $id));
			//}
		}
		if (empty($this->data)) {
			$this->data = $this->Chamado->read(null, $id);
		}
		//$problemas = $this->Chamado->Problema->find('list');
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
	}

	function meusChamadosAbertos($quantidade = 5){
		$this->layout = 'ajax';
		$this->pageTitle = "Meus Chamados";

		//$this->Chamado->Problema->unbindModel( array('hasMany' => array('Chamado')) );

		$this->paginate = array(
			'limit' => $quantidade, 
			'conditions' => array (
				'Chamado.usuario_id' => $this->usuarioId,
				'Chamado.status_id' => array (
		1,3,6
		)
		)
		);
		$this->Chamado->recursive = 1;
		$this->set('chamados', $this->paginate());
		//pr($this->paginate());
	}
	function meusChamadosEncerrados(){
		$this->layout = 'ajax';
		$this->pageTitle = "Meus Chamados";
		$this->paginate = array(
			'limit' => 5, 
			'conditions' => array (
				'Chamado.usuario_id' => $this->usuarioId,
				'Chamado.status_id' => array (
		2,4,5
		)
		)
		);
		$this->Chamado->recursive = 2;
		$this->set('chamados', $this->paginate());
		//pr($this->paginate());
	}

	/*
	 * Lista todos os chamados abertos do sistema de acordo com a área do atendente
	 * como o status ou a prioridade, caso omitidos esses serão listados todos
	 * considera-se aberto todo chamado que tenha um status diferente de encerrado
	 */

	function chamadosAbertos(){
		$this->pageTitle = "Chamados Abertos";

		$this->paginate = array(
			'limit' => 5, 
			'conditions' => array (
				'Problema.setor_id' => $this->usuarioSetor,
				'Chamado.status_id <> 4',
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
				'Problema.setor_id' => $this->usuarioSetor,
				'Chamado.status_id' => 4,
		),
			'recursive' => 2
		);


		//$this->Chamado->recursive = 2;
		$this->set('chamados', $this->paginate());

	}

	/*function atenderChamado($id){
		$this->pageTitle = "Atendimento de Chamado";

		if (!$id && empty($this->data)) {
		$this->Session->setFlash(__('Invalid Chamado', true));
		$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)){
			
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
		//$problemas = $this->Chamado->Problema->find('list');
		$usuarios = $this->Chamado->Usuario->find('list');
		$status = $this->Chamado->Status->find('list');
		$responsaveis = $this->Chamado->Responsavel->find('list');
		$this->set(compact('problemas','usuarios','status','responsaveis'));

		}*/

	function ajaxListaProblemaPorArea(){
		//pr($this->data);
		$this->layout = 'ajax';
		$problemas = $this->Problema->find('list', array (
			'order' => 'Problema.descricao ASC',
			'conditions' => array (
				'Problema.setor_id' => $this->data['Chamado']['setor_id'])
		));
		$this->set('problemas', $problemas);
		//echo $problemas;
	}

	function ajaxPrioridade(){
		$prioridadeId = $this->data['Chamado']['problema_id'];
		$this->layout = 'ajax';
		$prioridade = $this->Prioridade->find('first', array (
			'conditions' => array (
				'Prioridade.id' => $prioridadeId)
		));
		$this->set('prioridade', $prioridade);
		//echo $problemas;
	}

	function atender($id){
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Chamado', true));
			$this->redirect(array('action'=>'index'));
		}

		//
		if (!empty($this->data)) {
			$this->ChamadoHistorico->create();
			$this->data['ChamadoHistorico']['chamado_id'] = $this->data['Chamado']['id'] ;
			$this->data['ChamadoHistorico']['data_hora_final'] = date("Y-m-d H:i:s");
			// salva o histórico
			if ($this->ChamadoHistorico->save($this->data)) {
				// altera o status do chamado para em atendimento
				$chamado_historico_id = $this->ChamadoHistorico->getInsertID();
				$this->data['Chamado']['status_id'] = 1;
				// atribui a responsabilidade pelo chamado a quem está atendendo
				$this->data['Chamado']['responsavel_id'] = $this->usuarioId;
				if ($this->Chamado->save($this->data)) {
					$this->Session->setFlash(__('The Chamado has been saved', true));
					//pr($this->data);
					//$this->redirect('/atendimento/');
					$this->render('/atendimento');
				}else {
					// exclui o assentamento no historico do chamado
					// TODO falta informar o id do chamadao historico recem cadastrado
					$this->ChamadoHistorico->delete($chamado_historico_id);
					$this->Session->setFlash(__('The Chamado could not be saved. Please, try again.', true));
				}
			}else {
				$this->Session->setFlash(__('The Chamado could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			//$this->data = $this->Chamado->read(null, $id);
		}

		$chamado = $this->Chamado->read(null, $id);

		$problema = $this->Problema->find('first',
		array(
				'conditions' => array(
					'Problema.id' => $chamado['Chamado']['problema_id'],
		),
				'recursive' => 0
		)
		);

		$solicitante = $this->Usuario->find('first',
		array(
				'conditions' => array(
					'Usuario.id' => $chamado['Chamado']['usuario_id'],
		),
				'recursive' => 0
		)
		);

		$this->set(compact('problema', 'solicitante', 'chamado'));
		/*$problemas = $this->Chamado->Problema->find('list');
		 $usuarios = $this->Chamado->Usuario->find('list');
		 $status = $this->Chamado->Status->find('list');
		 $responsaveis = $this->Chamado->Responsavel->find('list');*/
		//$this->set(compact('problemas','usuarios','status','responsaveis'));

	}

}
?>
