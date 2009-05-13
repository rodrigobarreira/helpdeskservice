<?php 
/* SVN FILE: $Id$ */
/* UsuariosController Test cases generated on: 2009-04-30 21:04:49 : 1241138869*/
App::import('Controller', 'Usuarios');

class TestUsuarios extends UsuariosController {
	var $autoRender = false;
}

class UsuariosControllerTest extends CakeTestCase {
	var $Usuarios = null;

	function setUp() {
		$this->Usuarios = new TestUsuarios();
		$this->Usuarios->constructClasses();
	}

	function testUsuariosControllerInstance() {
		$this->assertTrue(is_a($this->Usuarios, 'UsuariosController'));
	}

	function tearDown() {
		unset($this->Usuarios);
	}
}
?>