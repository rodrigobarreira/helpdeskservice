<?php
class Problema extends AppModel {

	var $name = 'Problema';
	var $validate = array(
		'descricao' => array('notempty'),
		'sla_id' => array('numeric'),
		'setor_id' => array('numeric')
	);
	
	var $recursive = 1;
	var $displayField = 'descricao';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Sla' => array('className' => 'Sla',
								'foreignKey' => 'sla_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Setor' => array('className' => 'Setor',
								'foreignKey' => 'setor_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasMany = array(
			'Chamado' => array('className' => 'Chamado',
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