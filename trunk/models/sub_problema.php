<?php
class SubProblema extends AppModel {
	
	var $useTable = 'sub_problemas';
	var $name = 'SubProblema';
	var $validate = array(
		'problema_id' => array('numeric'),
		'descricao' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Problema' => array('className' => 'Problema',
								'foreignKey' => 'problema_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasMany = array(
			'Chamado' => array('className' => 'Chamado',
								'foreignKey' => 'sub_problema_id',
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