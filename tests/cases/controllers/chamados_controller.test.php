<?php 
/* SVN FILE: $Id$ */
/* ChamadosController Test cases generated on: 2009-04-30 21:04:37 : 1241138677*/
App::import('Controller', 'Chamados');

class TestChamados extends ChamadosController {
	var $autoRender = false;
}

class ChamadosControllerTest extends CakeTestCase {
	var $Chamados = null;

	function setUp() {
		$this->Chamados = new TestChamados();
		$this->Chamados->constructClasses();
	}

	function testChamadosControllerInstance() {
		$this->assertTrue(is_a($this->Chamados, 'ChamadosController'));
	}

	function tearDown() {
		unset($this->Chamados);
	}
}
?>