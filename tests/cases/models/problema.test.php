<?php
/* SVN FILE: $Id$ */
/* Problema Test cases generated on: 2009-04-30 21:04:28 : 1241137708*/
App::import('Model', 'Problema');

class TestProblema extends Problema {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class ProblemaTestCase extends CakeTestCase {
	var $Problema = null;
	var $fixtures = array('app.problema', 'app.sla', 'app.setor', 'app.chamado');

	function start() {
		parent::start();
		$this->Problema = new TestProblema();
	}

	function testProblemaInstance() {
		$this->assertTrue(is_a($this->Problema, 'Problema'));
	}

	function testProblemaFind() {
		$this->Problema->recursive = 1;
		$results = $this->Problema->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Problema' => array(
			'id'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet',
			'sla_id'  => 1,
			'setor_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>