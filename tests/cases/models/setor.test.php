<?php 
/* SVN FILE: $Id$ */
/* Setor Test cases generated on: 2009-04-30 21:04:57 : 1241137557*/
App::import('Model', 'Setor');

class TestSetor extends Setor {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class SetorTestCase extends CakeTestCase {
	var $Setor = null;
	var $fixtures = array('app.setor', 'app.sla', 'app.problema', 'app.usuario');

	function start() {
		parent::start();
		$this->Setor = new TestSetor();
	}

	function testSetorInstance() {
		$this->assertTrue(is_a($this->Setor, 'Setor'));
	}

	function testSetorFind() {
		$this->Setor->recursive = -2;
		$results = $this->Setor->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Setor' => array(
			'id'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet',
			'sla_id'  => 1,
			'atende_chamado'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>