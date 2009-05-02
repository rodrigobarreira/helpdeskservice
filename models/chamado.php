<?php
class Chamado extends AppModel {

	var $name = 'Chamado';
	var $validate = array(
		'problema_id' => array('numeric'),
		'usuario_id' => array('notempty'),
		'data_hora_abertura' => array('date'),
		'descricao_problema' => array('notempty'),
		'prioridade_id' => array('numeric'),
		'status_id' => array('notempty'),
		'data_hora_limite' => array('date'),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Problema' => array('className' => 'Problema',
								'foreignKey' => 'problema_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Usuario' => array('className' => 'Usuario',
								'foreignKey' => 'usuario_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Prioridade' => array('className' => 'Prioridade',
								'foreignKey' => 'prioridade_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Status' => array('className' => 'Status',
								'foreignKey' => 'status_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			),
			'Responsavel' => array('className' => 'Usuario',
								'foreignKey' => 'responsavel_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasOne = array(
			'Avaliacao' => array('className' => 'Avaliacao',
								'foreignKey' => 'chamado_id',
								'dependent' => false,
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

	var $hasMany = array(
			'ChamadoHistorico' => array('className' => 'ChamadoHistorico',
								'foreignKey' => 'chamado_id',
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