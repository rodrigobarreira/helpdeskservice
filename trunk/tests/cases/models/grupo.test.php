<?php
/* SVN FILE: $Id$ */
/* Grupo Test cases generated on: 2009-04-30 21:04:23 : 1241136023*/
App::import('Model', 'Grupo');

class TestGrupo extends Grupo {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
	//var $uses = array ('grupo', 'chamado');
}

class GrupoTestCase extends CakeTestCase {
	var $Grupo = null;
	//var $fixtures = array('app.grupo');
	var $fixtures = array('app.usuario', 'app.grupo');


	function start() {
		parent::start();
		$this->Grupo = new TestGrupo();
	}

	function testGrupoInstance() {
		$this->assertTrue(is_a($this->Grupo, 'Grupo'));
	}

	function testGrupoFind() {
		$this->Grupo->recursive = -3;
		$results = $this->Grupo->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Grupo' => array(
			'id'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet'
			));
			$this->assertEqual($results, $expected);
	}
}
?>