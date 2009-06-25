<?php
class SetoresController extends AppController {

	var $name = 'Setores';
	var $helpers = array('Html', 'Form');

	function index() {
		
			//$this->log("array('controller'=>'chamados', 'action'=> 'index'", LOG_DEBUG);
			//$this->redirect(array('controller'=>'chamados', 'action'=> 'index'));
			$this->pageTitle = "Gerenciamento de Setores";
			$conditions = array();

			$filtro = array();
			$campo = "";
			foreach ($this->passedArgs as $chave=>$valor){
				$campo = substr($chave, 4);
				// verifica se foi passado algum filtro como argumento
				// neste primeiro momento só será aceito um filtro
				if($chave == 'fil_remove' && $valor=='true'){
					$this->Session->del('SetoresFiltro.filtro');
				}else{
					if(substr($chave, 0, 4) == 'fil_'){
						if($campo == 'Setor.descricao' ){
							$filtro = array($campo. " like '".$valor."%'");
						}elseif($campo == 'Setor.id' ){
							$filtro = array($campo  => $valor);
						}else{
							$filtro = array($campo  => $valor);
						}
						
						$this->Session->write('SetoresFiltro.filtro', $filtro);
						//if($campo  == 'chamado_status_id'){
							//$conditions = $filtro;
						//}else{
							$conditions = array_merge($conditions,$filtro);
						//}
						break;
					}
				}
			}
			//pr($conditions );
			if (count($filtro) == 0 ){
				if ($this->Session->read('SetoresFiltro.filtro') && is_array($this->Session->read('SetoresFiltro.filtro'))){
					$filtro =  $this->Session->read('SetoresFiltro.filtro');
					/*if($campo  == 'chamado_status_id'){
						$conditions = $filtro;
					}else{*/
						$conditions = array_merge($conditions,$filtro);
					//}
				}
			}

			if (isset($this->passedArgs['limit'])){
				// foi informado a quantidade de registros via combo
				$quantidade = $this->passedArgs['limit'];
				$this->Session->write('Setores.limit', $quantidade);
			}else{
				// não foi informado a quantidade de registro então pega da sessão
				//$this->Session->del('MeusChamados.limit');
				if ($this->Session->read('Setores.limit') && is_numeric($this->Session->read('Setores.limit'))){
					$quantidade =  $this->Session->read('Setores.limit');
				}else{
					// caso não seja ainda definido na seção
					$quantidade =  5;
					// grava na seção
					$this->Session->write('Setores.limit', $quantidade);
				}
			}


			//die();
			$this->paginate = array(
			'limit' =>$quantidade, 
			'conditions' => $conditions,
			'order' => array ('Setor.descricao ASC')
			);

			//$this->Chamado->recursive = 2;
			$this->set('setores', $this->paginate('Setor'));
			$this->set('quantidade', $quantidade);
				
		
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Setor.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('setor', $this->Setor->read(null, $id));
	}

	function add() {
		$this->pageTitle = "Inclusão de Setor";
		//pr($this->data);
		//pr($this->Setor);
		if (!empty($this->data)) {
			$this->Setor->create();
			if ($this->Setor->save($this->data)) {
				$this->Session->setFlash(__('Dados do Setor salvos com sucesso!', true), 'default', array('class' => 'messageSucess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Erro ao salvar dados do Setor.', true));
			}
		}
		///$slas = $this->Setor->Sla->find('list');
		//$this->set(compact('slas'));
	}

	function edit($id = null) {
		$this->pageTitle = "Alteração de Setor";
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Setor Inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Setor->save($this->data)) {
				$this->Session->setFlash(__('Dados do Setor salvos com sucesso!', true), 'default', array('class' => 'messageSucess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('Erro ao salvar dados do Setor.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Setor->read(null, $id);
		}
		
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Setor', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Setor->del($id, 'false')) {
			$this->Session->setFlash(__('Setor excluído com sucesso.', true), 'default', array('class' => 'messageSucess'));
			$this->redirect(array('action'=>'index'));
		}else{
			$this->Session->setFlash(__('Não foi possível excluir o setor selecionado.', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function getAreas(){
		$this->set('dados', $this->Setor->find('list', array(
			'order' => 'descricao ASC',
			'conditions' => array(
				'atende_chamado' => 1 
		)
		)));
	}
	
	function getSetores(){
		$this->set('dados', $this->Setor->find('list', array(
			'order' => 'descricao ASC',
			'conditions' => array(
				//'atende_chamado' => 1 
		)
		)));
	}
}
?>