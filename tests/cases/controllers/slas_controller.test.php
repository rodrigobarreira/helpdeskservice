<?php
/* SVN FILE: $Id$ */
/* SlasController Test cases generated on: 2009-04-30 21:04:53 : 1241138813*/
App::import('Controller', 'Slas');

class TestSlas extends SlasController {
	var $autoRender = false;
}

class SlasControllerTest extends CakeTestCase {
	var $Slas = null;

	function setUp() {
		$this->Slas = new TestSlas();
		$this->Slas->constructClasses();
	}

	function testSlasControllerInstance() {
		$this->assertTrue(is_a($this->Slas, 'SlasController'));
	}

	function tearDown() {
		unset($this->Slas);
	}
}
?>