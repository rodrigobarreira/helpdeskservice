<?php
class DATABASE_CONFIG {

	var $default = array(
		'driver' => 'mysql',
		'persistent' => true,
		'host' => 'localhost',
		'login' => 'root',
		'password' => 'root',
		'database' => 'banco_helpdesk',
		'encoding' => 'utf-8', 
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