<?php
/* SVN FILE: $Id$ */
/* Problema Fixture generated on: 2009-04-30 21:04:28 : 1241137708*/

class ProblemaFixture extends CakeTestFixture {
	var $name = 'Problema';
	var $table = 'problemas';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'descricao' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
			'sla_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
			'setor_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'sla_id' => array('column' => 'sla_id', 'unique' => 0))
	);
	var $records = array(array(
			'id'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet',
			'sla_id'  => 1,
			'setor_id'  => 1
	));
}
?>