<?php
class AppController extends Controller{
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Paginator', 'Time');
	var $components = array (
		// componente para login e autorização de funções	
		'Auth',
		// componente para controle de Sessão
		'Session'
	);

	function beforeFilter() {		
		// informa ao cake que a aplicação utilizará o sistema lingua pt_br
		Configure :: write('Config.language', "pt_br");

		// especifica que cada controladora implementará as regras de acesso as funções (actions)
		$this->Auth->authorize = 'controller';
		
		// informa ao cake qual modelo (tabela) conterá os dados de login
		$this->Auth->userModel = 'Usuario';
		
		// informa ao cake quais campos da tabela será utilizado para conferir o login e senha
		$this->Auth->fields = array (
			'username' => 'matricula',
			'password' => 'senha'
		);
		
		// variável que restringe somente os usuários ativos poderão efetuar o login
		$this->Auth->userScope = array('Usuario.ativo' => 'S');
		
		// caso ocorra algum erro de login "será exibido" a mensagem
		$this->Auth->loginError = __("Usuario nao encontrado", true);

		// informa qual a função de login
		$this->Auth->loginAction = array (
			'controller' => 'usuarios',
			'action' => 'login'
		);
		
		// informa para qual página redirecionar após o sucesso do login
		$this->Auth->loginRedirect = array (
			'controller' => 'chamados',
			'action' => 'index'
		);
		
		// "exibe a mensagem" de acesso negado a alguma funcionalidade do sistema
		$this->Auth->authError = "Sem permiss&atilde;o para a funç&atilde;o desejada.";
		
		// cria as variáveis para serem utilizadas na view
		$this->set('usuarioId', $this->Auth->user('id'));
		$this->set('usuarioNome', $this->Auth->user('nome'));
		$this->set('usuarioGrupo', $this->Auth->user('grupo_id'));
	}

	function isAuthorized() {

		return true;

	}
		
}
?>