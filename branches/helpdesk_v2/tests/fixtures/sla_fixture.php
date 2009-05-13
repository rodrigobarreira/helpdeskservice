<?php 
/* SVN FILE: $Id$ */
/* Sla Fixture generated on: 2009-04-30 21:04:46 : 1241137666*/

class SlaFixture extends CakeTestFixture {
	var $name = 'Sla';
	var $table = 'slas';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'tempo' => array('type'=>'integer', 'null' => false, 'default' => NULL),
			'descricao' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
			);
	var $records = array(array(
			'id'  => 1,
			'tempo'  => 1,
			'descricao'  => 'Lorem ipsum dolor sit amet'
			));
}
?>