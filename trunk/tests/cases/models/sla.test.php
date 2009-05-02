<?php 
/* SVN FILE: $Id$ */
/* Sla Test cases generated on: 2009-04-30 21:04:46 : 1241137666*/
App::import('Model', 'Sla');

class TestSla extends Sla {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class SlaTestCase extends CakeTestCase {
	var $Sla = null;
	var $fixtures = array('app.sla', 'app.problema', 'app.setor');

	function start() {
		parent::start();
		$this->Sla = new TestSla();
	}

	function testSlaInstance() {
		$this->assertTrue(is_a($this->Sla, 'Sla'));
	}

	function testSlaFind() {
		$this->Sla->recursive = -2;
		$results = $this->Sla->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Sla' => array(
			'id'  => 1,
			'tempo'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet'
			));
		$this->assertEqual($results, $expected);
	}
}
?>