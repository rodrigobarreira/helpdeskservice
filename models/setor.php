<?php
class Setor extends AppModel {

	var $name = 'Setor';
	var $validate = array(
		'descricao' => array('numeric'),
		'sla_id' => array('numeric'),
		'atende_chamado' => array('comparison')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Sla' => array('className' => 'Sla',
								'foreignKey' => 'sla_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasMany = array(
			'Problema' => array('className' => 'Problema',
								'foreignKey' => 'setor_id',
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
			'Usuario' => array('className' => 'Usuario',
								'foreignKey' => 'setor_id',
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