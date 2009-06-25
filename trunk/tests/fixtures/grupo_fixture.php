<?php
/* SVN FILE: $Id$ */
/* Grupo Fixture generated on: 2009-04-30 21:04:22 : 1241136022*/

class GrupoFixture extends CakeTestFixture {
	var $name = 'Grupo';
	var $table = 'grupos';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'descricao' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 45),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
			'id'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet'
			));
}
?>