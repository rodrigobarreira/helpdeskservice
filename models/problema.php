<?php
class Problema extends AppModel {

	var $name = 'Problema';
	var $validate = array(
		'descricao' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Problema' => array('className' => 'Problema',
								'foreignKey' => 'problema_id',
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