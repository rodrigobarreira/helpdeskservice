<?php
class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'banco_helpdesk',
		'encoding' => 'iso-8859-1', 
	);
	
	/*var $test = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'test_banco_helpdesk',
		'prefix' => '',
	);*/
	
	var $test_suite = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'test_banco_helpdesk',
		'prefix' => '',
	);
}
?>