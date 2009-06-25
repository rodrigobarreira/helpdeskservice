<?php
/* SVN FILE: $Id$ */
/* Setor Fixture generated on: 2009-04-30 21:04:57 : 1241137557*/

class SetorFixture extends CakeTestFixture {
	var $name = 'Setor';
	var $table = 'setores';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'descricao' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 45),
			'sla_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'atende_chamado' => array('type'=>'integer', 'null' => false, 'default' => '0', 'length' => 4),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
			'id'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet',
			'sla_id'  => 1,
			'atende_chamado'  => 1
	));
}
?>