<?php
class Setor extends AppModel {

	var $name = 'Setor';
	var $validate = array(
		/*'descricao' => array(
			'rule' => 'notEmpty',
			'message' => 'Informe o nome do setor'
		),*/
		'descricao' => array('notEmpty'),
		//'nome' => array('notEmpty')
		//'sla_id' => array('numeric'),
		//'atende_chamado' => array('boolean')
	);

	var $recursive = -1;
	var $displayField = 'descricao';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			/*'Sla' => array('className' => 'Sla',
								'foreignKey' => 'sla_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
								)*/
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