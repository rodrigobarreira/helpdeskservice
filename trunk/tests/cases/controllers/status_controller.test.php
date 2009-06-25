<?php
/* SVN FILE: $Id$ */
/* StatusController Test cases generated on: 2009-04-30 21:04:29 : 1241138849*/
App::import('Controller', 'Status');

class TestStatus extends StatusController {
	var $autoRender = false;
}

class StatusControllerTest extends CakeTestCase {
	var $Status = null;

	function setUp() {
		$this->Status = new TestStatus();
		$this->Status->constructClasses();
	}

	function testStatusControllerInstance() {
		$this->assertTrue(is_a($this->Status, 'StatusController'));
	}

	function tearDown() {
		unset($this->Status);
	}
}
?>