<?php
class Sla extends AppModel {

	var $name = 'Sla';
	var $validate = array(
		'tempo' => array('numeric'),
		'descricao' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Problema' => array('className' => 'Problema',
								'foreignKey' => 'sla_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => '',
								'limit' => '',
								'offset' => '',
								'exclusive' => '',
								'finderQuery' => '',
								'counterQuery' => ''
								),
			'Setor' => array('className' => 'Setor',
								'foreignKey' => 'sla_id',
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