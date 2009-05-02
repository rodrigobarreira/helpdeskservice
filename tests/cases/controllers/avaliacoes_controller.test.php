<?php 
/* SVN FILE: $Id$ */
/* AvaliacoesController Test cases generated on: 2009-04-30 21:04:40 : 1241138200*/
App::import('Controller', 'Avaliacoes');

class TestAvaliacoes extends AvaliacoesController {
	var $autoRender = false;
}

class AvaliacoesControllerTest extends CakeTestCase {
	var $Avaliacoes = null;

	function setUp() {
		$this->Avaliacoes = new TestAvaliacoes();
		$this->Avaliacoes->constructClasses();
	}

	function testAvaliacoesControllerInstance() {
		$this->assertTrue(is_a($this->Avaliacoes, 'AvaliacoesController'));
	}

	function tearDown() {
		unset($this->Avaliacoes);
	}
}
?>