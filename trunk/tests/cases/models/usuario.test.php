<?php 
/* SVN FILE: $Id$ */
/* Usuario Test cases generated on: 2009-04-30 21:04:55 : 1241137495*/
App::import('Model', 'Usuario');

class TestUsuario extends Usuario {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class UsuarioTestCase extends CakeTestCase {
	var $Usuario = null;
	var $fixtures = array('app.usuario', 'app.grupo');

	function start() {
		parent::start();
		$this->Usuario = new TestUsuario();
	}

	function testUsuarioInstance() {
		$this->assertTrue(is_a($this->Usuario, 'Usuario'));
	}

	function testUsuarioFind() {
		$this->Usuario->recursive = -3;
		$results = $this->Usuario->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Usuario' => array(
			'id'  => 1,
			'grupo_id'  => 1,
			'setor_id'  => 1,
			'matricula'  => 'Lorem ipsum dolor ',
			'nome'  => 'Lorem ipsum dolor sit amet',
			'senha'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'celular'  => 'Lorem ipsum dolor ',
			'telefone'  => 'Lorem ipsum dolor ',
			'ramal'  => 'Lorem ip',
			'ativo'  => 'Lorem ipsum dolor sit ame',
			'data_cadastro'  => '2009-04-30 21:24:55'
			));
		$this->assertEqual($results, $expected);
	}
}
?>