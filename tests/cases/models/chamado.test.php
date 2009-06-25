<?php
/* SVN FILE: $Id$ */
/* Chamado Test cases generated on: 2009-04-30 21:04:29 : 1241137829*/
App::import('Model', 'Chamado');

class TestChamado extends Chamado {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class ChamadoTestCase extends CakeTestCase {
	var $Chamado = null;
	var $fixtures = array('app.chamado', 'app.problema', 'app.usuario', 'app.status', 'app.responsavel', 'app.avaliacao', 'app.chamado_historico');

	function start() {
		parent::start();
		$this->Chamado = new TestChamado();
	}

	function testChamadoInstance() {
		$this->assertTrue(is_a($this->Chamado, 'Chamado'));
	}

	function testChamadoFind() {
		$this->Chamado->recursive = -2;
		$results = $this->Chamado->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Chamado' => array(
			'id'  => 1,
			'problema_id'  => 1,
			'usuario_id'  => 1,
			'data_hora_abertura'  => '2009-04-30 21:30:29',
			'aberto_por'  => 1,
			'descricao_problema'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,
									phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,
									vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,
									feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.
									Orci aliquet, in lorem et velit maecenas luctus, wisi nulla at, mauris nam ut a, lorem et et elit eu.
									Sed dui facilisi, adipiscing mollis lacus congue integer, faucibus consectetuer eros amet sit sit,
									magna dolor posuere. Placeat et, ac occaecat rutrum ante ut fusce. Sit velit sit porttitor non enim purus,
									id semper consectetuer justo enim, nulla etiam quis justo condimentum vel, malesuada ligula arcu. Nisl neque,
									ligula cras suscipit nunc eget, et tellus in varius urna odio est. Fuga urna dis metus euismod laoreet orci,
									litora luctus suspendisse sed id luctus ut. Pede volutpat quam vitae, ut ornare wisi. Velit dis tincidunt,
									pede vel eleifend nec curabitur dui pellentesque, volutpat taciti aliquet vivamus viverra, eget tellus ut
									feugiat lacinia mauris sed, lacinia et felis.',
			'descricao_solucao'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,
									phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,
									vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,
									feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.
									Orci aliquet, in lorem et velit maecenas luctus, wisi nulla at, mauris nam ut a, lorem et et elit eu.
									Sed dui facilisi, adipiscing mollis lacus congue integer, faucibus consectetuer eros amet sit sit,
									magna dolor posuere. Placeat et, ac occaecat rutrum ante ut fusce. Sit velit sit porttitor non enim purus,
									id semper consectetuer justo enim, nulla etiam quis justo condimentum vel, malesuada ligula arcu. Nisl neque,
									ligula cras suscipit nunc eget, et tellus in varius urna odio est. Fuga urna dis metus euismod laoreet orci,
									litora luctus suspendisse sed id luctus ut. Pede volutpat quam vitae, ut ornare wisi. Velit dis tincidunt,
									pede vel eleifend nec curabitur dui pellentesque, volutpat taciti aliquet vivamus viverra, eget tellus ut
									feugiat lacinia mauris sed, lacinia et felis.',
			'data_hora_atendimento'  => '2009-04-30 21:30:29',
			'status_id'  => 1,
			'data_hora_encerramento'  => '2009-04-30 21:30:29',
			'responsavel_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>