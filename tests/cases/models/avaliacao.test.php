<?php 
/* SVN FILE: $Id$ */
/* Avaliacao Test cases generated on: 2009-04-30 21:04:39 : 1241137959*/
App::import('Model', 'Avaliacao');

class TestAvaliacao extends Avaliacao {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class AvaliacaoTestCase extends CakeTestCase {
	var $Avaliacao = null;
	var $fixtures = array('app.avaliacao', 'app.chamado');

	function start() {
		parent::start();
		$this->Avaliacao = new TestAvaliacao();
	}

	function testAvaliacaoInstance() {
		$this->assertTrue(is_a($this->Avaliacao, 'Avaliacao'));
	}

	function testAvaliacaoFind() {
		$this->Avaliacao->recursive = -2;
		$results = $this->Avaliacao->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Avaliacao' => array(
			'id'  => 1,
			'data_hora'  => '2009-04-30 21:32:39',
			'nivel'  => 1,
			'chamado_id'  => 1
			));
		$this->assertEqual($results, $expected);
	}
}
?>