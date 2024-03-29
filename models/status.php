<?php
class Status extends AppModel {

	var $name = 'Status';
	var $validate = array(
		'descricao' => array('numeric')
	);
	var $displayField = 'descricao';

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Chamado' => array('className' => 'Chamado',
								'foreignKey' => 'status_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
								)
								);

}
?>