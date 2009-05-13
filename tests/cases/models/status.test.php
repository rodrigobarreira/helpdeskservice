<?php 
/* SVN FILE: $Id$ */
/* Status Test cases generated on: 2009-04-30 21:04:49 : 1241137609*/
App::import('Model', 'Status');

class TestStatus extends Status {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class StatusTestCase extends CakeTestCase {
	var $Status = null;
	var $fixtures = array('app.status', 'app.chamado');

	function start() {
		parent::start();
		$this->Status = new TestStatus();
	}

	function testStatusInstance() {
		$this->assertTrue(is_a($this->Status, 'Status'));
	}

	function testStatusFind() {
		$this->Status->recursive = -2;
		$results = $this->Status->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Status' => array(
			'id'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet'
			));
		$this->assertEqual($results, $expected);
	}
}
?>