<?php 
/* SVN FILE: $Id$ */
/* Chamado Fixture generated on: 2009-04-30 21:04:29 : 1241137829*/

class ChamadoFixture extends CakeTestFixture {
	var $name = 'Chamado';
	var $table = 'chamados';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'problema_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
			'usuario_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
			'data_hora_abertura' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
			'aberto_por' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
			'descricao_problema' => array('type'=>'text', 'null' => false, 'default' => NULL),
			'descricao_solucao' => array('type'=>'text', 'null' => true, 'default' => NULL),
			'data_hora_atendimento' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'status_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
			'data_hora_encerramento' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
			'responsavel_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_chamados_status' => array('column' => 'status_id', 'unique' => 0), 'fk_chamados_sub_problemas' => array('column' => 'problema_id', 'unique' => 0), 'fk_chamados_usuarios' => array('column' => 'usuario_id', 'unique' => 0), 'fk_chamados_usuarios1' => array('column' => 'responsavel_id', 'unique' => 0), 'aberto_por' => array('column' => 'aberto_por', 'unique' => 0))
			);
	var $records = array(array(
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
}
?>