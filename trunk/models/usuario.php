<?php
class Usuario extends AppModel {

	var $name = 'Usuario';
	var $displayField = 'nome';
	var $validate = array(
		'grupo_id' => array('numeric'),
		'setor_id' => array('numeric'),
		'matricula' => array('alphanumeric'),
		'nome' => array('notempty'),
		'senha' => array('alphanumeric'),
		//'email' => array('email'),
		//'celular' => array('phone'),
		//'telefone' => array('phone'),
		//'ramal' => array('alphanumeric'),
		'ativo' => array('boolean'),
		//'data_cadastro' => array('date')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Grupo' => array('className' => 'Grupo',
								'foreignKey' => 'grupo_id',
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
			'ChamadoHistorico' => array('className' => 'ChamadoHistorico',
								'foreignKey' => 'usuario_id',
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
			'Chamado' => array('className' => 'Chamado',
								'foreignKey' => 'usuario_id',
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