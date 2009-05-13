<?php 
/* SVN FILE: $Id$ */
/* SetoresController Test cases generated on: 2009-04-30 21:04:15 : 1241138775*/
App::import('Controller', 'Setores');

class TestSetores extends SetoresController {
	var $autoRender = false;
}

class SetoresControllerTest extends CakeTestCase {
	var $Setores = null;

	function setUp() {
		$this->Setores = new TestSetores();
		$this->Setores->constructClasses();
	}

	function testSetoresControllerInstance() {
		$this->assertTrue(is_a($this->Setores, 'SetoresController'));
	}

	function tearDown() {
		unset($this->Setores);
	}
}
?>