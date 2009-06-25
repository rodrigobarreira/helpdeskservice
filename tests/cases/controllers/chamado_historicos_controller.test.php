<?php
/* SVN FILE: $Id$ */
/* ChamadoHistoricosController Test cases generated on: 2009-04-30 21:04:25 : 1241138425*/
App::import('Controller', 'ChamadoHistoricos');

class TestChamadoHistoricos extends ChamadoHistoricosController {
	var $autoRender = false;
}

class ChamadoHistoricosControllerTest extends CakeTestCase {
	var $ChamadoHistoricos = null;

	function setUp() {
		$this->ChamadoHistoricos = new TestChamadoHistoricos();
		$this->ChamadoHistoricos->constructClasses();
	}

	function testChamadoHistoricosControllerInstance() {
		$this->assertTrue(is_a($this->ChamadoHistoricos, 'ChamadoHistoricosController'));
	}

	function tearDown() {
		unset($this->ChamadoHistoricos);
	}
}
?>