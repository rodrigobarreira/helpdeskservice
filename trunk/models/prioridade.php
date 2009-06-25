<?php
class Prioridade extends AppModel {

	var $name = 'Prioridade';
	var $validate = array(
		'tempo' => array('numeric'),
		'descricao' => array('notempty')
	);

	var $displayField = 'descricao';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Problema' => array('className' => 'Problema',
								'foreignKey' => 'prioridade_id',
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