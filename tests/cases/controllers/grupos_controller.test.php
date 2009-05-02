<?php 
/* SVN FILE: $Id$ */
/* GruposController Test cases generated on: 2009-04-30 21:04:45 : 1241138745*/
App::import('Controller', 'Grupos');

class TestGrupos extends GruposController {
	var $autoRender = false;
}

class GruposControllerTest extends CakeTestCase {
	var $Grupos = null;

	function setUp() {
		$this->Grupos = new TestGrupos();
		$this->Grupos->constructClasses();
	}

	function testGruposControllerInstance() {
		$this->assertTrue(is_a($this->Grupos, 'GruposController'));
	}

	function tearDown() {
		unset($this->Grupos);
	}
}
?>