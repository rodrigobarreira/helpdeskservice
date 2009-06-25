<?php
/* SVN FILE: $Id$ */
/* PrioridadesController Test cases generated on: 2009-05-11 01:05:04 : 1242015064*/
App::import('Controller', 'Prioridades');

class TestPrioridades extends PrioridadesController {
	var $autoRender = false;
}

class PrioridadesControllerTest extends CakeTestCase {
	var $Prioridades = null;

	function setUp() {
		$this->Prioridades = new TestPrioridades();
		$this->Prioridades->constructClasses();
	}

	function testPrioridadesControllerInstance() {
		$this->assertTrue(is_a($this->Prioridades, 'PrioridadesController'));
	}

	function tearDown() {
		unset($this->Prioridades);
	}
}
?>