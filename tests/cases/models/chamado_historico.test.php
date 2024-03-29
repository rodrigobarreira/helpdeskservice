<?php
/* SVN FILE: $Id$ */
/* ChamadoHistorico Test cases generated on: 2009-04-30 21:04:28 : 1241137888*/
App::import('Model', 'ChamadoHistorico');

class TestChamadoHistorico extends ChamadoHistorico {
	var $cacheSources = false;
	var $useDbConfig  = 'test_suite';
}

class ChamadoHistoricoTestCase extends CakeTestCase {
	var $ChamadoHistorico = null;
	var $fixtures = array('app.chamado_historico', 'app.chamado', 'app.usuario');

	function start() {
		parent::start();
		$this->ChamadoHistorico = new TestChamadoHistorico();
	}

	function testChamadoHistoricoInstance() {
		$this->assertTrue(is_a($this->ChamadoHistorico, 'ChamadoHistorico'));
	}

	function testChamadoHistoricoFind() {
		$this->ChamadoHistorico->recursive = -2;
		$results = $this->ChamadoHistorico->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ChamadoHistorico' => array(
			'id'  => 1,
			'data_hora_incial'  => '2009-04-30 21:31:27',
			'data_hora_final'  => '2009-04-30 21:31:27',
			'chamado_id'  => 1,
			'usuario_id'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,
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
									feugiat lacinia mauris sed, lacinia et felis.'
									));
									$this->assertEqual($results, $expected);
	}
}
?>