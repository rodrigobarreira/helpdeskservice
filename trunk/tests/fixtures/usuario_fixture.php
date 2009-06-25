<?php
/* SVN FILE: $Id$ */
/* Usuario Fixture generated on: 2009-04-30 21:04:55 : 1241137495*/

class UsuarioFixture extends CakeTestFixture {
	var $name = 'Usuario';
	var $table = 'usuarios';
	var $fields = array(
			'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
			'grupo_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
			'setor_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
			'matricula' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 20, 'key' => 'unique'),
			'nome' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 150),
			'senha' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 50),
			'email' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 150),
			'celular' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
			'telefone' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 20),
			'ramal' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 10),
			'ativo' => array('type'=>'string', 'null' => false, 'default' => 'S', 'length' => 1),
			'data_cadastro' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
			'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'matricula' => array('column' => 'matricula', 'unique' => 1), 'fk_usuarios_grupos' => array('column' => 'grupo_id', 'unique' => 0), 'fk_usuarios_setores' => array('column' => 'setor_id', 'unique' => 0), 'matricula_2' => array('column' => 'matricula', 'unique' => 0))
	);
	var $records = array(array(
			'id'  => 1,
			'grupo_id'  => 1,
			'setor_id'  => 1,
			'matricula'  => 'Lorem ipsum dolor ',
			'nome'  => 'Lorem ipsum dolor sit amet',
			'senha'  => 'Lorem ipsum dolor sit amet',
			'email'  => 'Lorem ipsum dolor sit amet',
			'celular'  => 'Lorem ipsum dolor ',
			'telefone'  => 'Lorem ipsum dolor ',
			'ramal'  => 'Lorem ip',
			'ativo'  => 'Lorem ipsum dolor sit ame',
			'data_cadastro'  => '2009-04-30 21:24:55'
			));
}
?>