<?php
/* SVN FILE: $Id$ */
/* ProblemasController Test cases generated on: 2009-04-30 21:04:02 : 1241138762*/
App::import('Controller', 'Problemas');

class TestProblemas extends ProblemasController {
	var $autoRender = false;
}

class ProblemasControllerTest extends CakeTestCase {
	var $Problemas = null;

	function setUp() {
		$this->Problemas = new TestProblemas();
		$this->Problemas->constructClasses();
	}

	function testProblemasControllerInstance() {
		$this->assertTrue(is_a($this->Problemas, 'ProblemasController'));
	}

	function tearDown() {
		unset($this->Problemas);
	}
}
?>