<?php
class UsuariosController extends AppController {

	var $name = 'Usuarios';
	var $helpers = array('Html', 'Form', 'Xml');

	function index() {
		// verifica se o usu�rio est� autenticado
		if(!$this->Auth->user('id')){
			// n�o est� autenticado
			//$this->log("array('controller'=>'usuarios', 'action'=> 'login'", LOG_DEBUG);
			$this->redirect(array('controller'=>'usuarios', 'action'=> 'login'));
		}else{
			//$this->log("array('controller'=>'chamados', 'action'=> 'index'", LOG_DEBUG);
			$this->redirect(array('controller'=>'chamados', 'action'=> 'index'));
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Usuario.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Usuario->create();
			if ($this->Usuario->save($this->data)) {
				$this->Session->setFlash(__('The Usuario has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Usuario could not be saved. Please, try again.', true));
			}
		}
		$grupos = $this->Usuario->Grupo->find('list');
		$setores = $this->Usuario->Setor->find('list');
		$this->set(compact('grupos', 'setores'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Usuario', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Usuario->save($this->data)) {
				$this->Session->setFlash(__('The Usuario has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Usuario could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Usuario->read(null, $id);
		}


		$grupos = $this->Usuario->Grupo->find('list');
		$setores = $this->Usuario->Setor->find('list');
		$this->set(compact('grupos','setores'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Usuario', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Usuario->del($id)) {
			$this->Session->setFlash(__('Usuario deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	/**
	 * Função que lista os chamados do usu�rio logado, que tenha ele como solicitante
	 * @access public
	 * @name meusChamados
	 * @return void
	 */

	public function meusChamados(){
		$this->Usuario->Chamado->recursive = 1;
		$this->paginate = array('limit' => 5,
			'where' => "Chamado.usuario_id = '$this->usuarioId'",
			'order' => 'Chamado.id DESC'
			);

			$this->set('chamados', $this->paginate());

			/*$this->Usuario->Chamado->find('all', array(
			 'conditions' => array('Chamado.usuario_id' => $this->usuarioId),
			 'order' => 'Chamado.id DESC'
			 ));*/

	}

	/* função que altera a senha atual do usu�rio
	 * deve ser informada a senha atual e a nova senha
	 * sendo a nova senha deve ser informada duas vezes
	 * para verificação da mesma
	 */
	function alterarSenha(){
		if (!empty($this->data)) {
			// verifica se foi informado o campo senha atual
			if ($this->data['Usuario']['senha_atual'] == null){
				$this->Session->setFlash('Informe a senha atual.');
				//$this->redirect(array('action'=>'alterarSenha'));
				$this->render('alterarSenha');
			}elseif($this->data['Usuario']['senha_nova'] == null){
				$this->Session->setFlash('Informe a nova senha.');
				//$this->redirect(array('action'=>'alterarSenha'));
				$this->render('alterarSenha');
			}elseif($this->data['Usuario']['senha_confirmar'] == null){
				$this->Session->setFlash('Informe a senha de confirma��o.');
				//$this->redirect(array('action'=>'alterarSenha'));
				$this->render('alterarSenha');
			}elseif ($this->data['Usuario']['senha_nova'] != $this->data['Usuario']['senha_confirmar']){
				$this->Session->setFlash('Os campos Nova Senha e Confirmar Senha<br />devem ser preenchidos com o mesmo valor.');
				//$this->redirect(array('action'=>'alterarSenha'));
			}else{
				$senha_atual = $this->Auth->password($this->data['Usuario']['senha_atual']);
				$this->data['Usuario']['matricula']= $this->usuarioMatricula;
				$this->data['Usuario']['senha']= $senha_atual;
				$usuario = $this->Auth->identify($this->data);
				if ($usuario != false){
					$this->data['Usuario']['senha'] = $this->Auth->password($this->data['Usuario']['senha_nova']);
					$this->data['Usuario']['id'] = $this->usuarioId;
					if ($this->Usuario->save($this->data)){
						$this->Session->setFlash('Senha Alterada com sucesso!');
						$this->redirect('/home');
					}else{
						$this->Session->setFlash('N�o foi poss�vel alterar a sua senha!');	
					}
				}else{
					$this->Session->setFlash('Senha atual n�o confere!');
				}
					
				//$this->redirect(array('action'=>'index'));
					
				//unset($this->data['Usuario']['senha']);
			}
		}
	}

	function recuperarAcesso(){
		$this->layout = 'login';
		if(!empty($this->data)){
			//verifica se campos estao preenchidos
			if($this->data['Usuario']['matricula']==null){
				$this->Session->setFlash('Informe a matr&iacute;cula.');				
			}/*elseif ($this->data['Usuario']['email']==null){
				$this->Session->setFlash('Informe o e-mail.');	}	*/
			// envia email para o usuário						
		}else{
		// criar nova senha a partir da senha do usu�rio
		
		// enviar e mail para o usu�rio  	
		
		}
		
	}
	function login(){
		$this->layout = 'login';
		//pr($this->Auth);
		//$this->redirect(array('controller' => 'chamados', 'actions' => 'index'));

	}

	function logout(){
		$this->redirect($this->Auth->logout());
	}

	function beforeFilter(){
		$this->Auth->allow('index', 'login', 'alterarSenha', 'edit', 'recuperarAcesso');
		//pr ($this->Auth);
		parent::beforeFilter();
		//pr($this->Auth);


	}

	function isAuthorized() {
		return true;
	}

}
?>