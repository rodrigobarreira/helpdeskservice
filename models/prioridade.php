<?php
class Prioridade extends AppModel {

	var $name = 'Prioridade';
	var $validate = array(
		'descricao' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
			'Chamado' => array('className' => 'Chamado',
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