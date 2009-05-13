<?php 
/* SVN FILE: $Id$ */
/* Avaliacao Fixture generated on: 2009-04-30 21:04:39 : 1241137959*/

class AvaliacaoFixture extends CakeTestFixture {
	var $name = 'Avaliacao';
	var $table = 'avaliacoes';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'data_hora' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
			'nivel' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'chamado_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_avaliacoes_chamados' => array('column' => 'chamado_id', 'unique' => 0))
			);
	var $records = array(array(
			'id'  => 1,
			'data_hora'  => 'a 21:32:39',
			'nivel'  => "a",
			'chamado_id'  => 1
			));
}
?>