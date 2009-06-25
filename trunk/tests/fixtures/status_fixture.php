<?php
/* SVN FILE: $Id$ */
/* Status Fixture generated on: 2009-04-30 21:04:49 : 1241137609*/

class StatusFixture extends CakeTestFixture {
	var $name = 'Status';
	var $table = 'status';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'descricao' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 45),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
			'id'  => 'as',
			'descricao'  => 'Lorem ipsum dolor sit amet'
			));
}
?>