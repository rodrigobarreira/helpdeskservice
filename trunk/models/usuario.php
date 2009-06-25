<?php
class Usuario extends AppModel {

	var $name = 'Usuario';
	var $displayField = 'nome';
	
	
	var $validate = array(
		'grupo_id' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Selecione um Grupo'
		),
		'setor_id' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Selecione uma Setor'
		),
		'matricula' => array(
			'campo_em_branco' => array(
				'rule' => 'alphanumeric',
				'message' => 'Informe a matrícula'
			),
			'valor_unico' => array(
				'rule' => 'isUnique',
				'message' => 'Matrícula informada já cadastrada'
			)
		),
		'nome' => array(
			'campo_em_branco' => array(
				'rule' => 'notEmpty',
				'message' => 'Informe o nome'
			),
			
		),
		'senha' => array(
			'campo_em_branco' => array(
				'rule' => 'email',
				'message' => 'Email inválido'
			),
			'valor_unico' => array(
				'rule' => 'isUnique',
				'message' => 'Email informado já cadastrado'
			)
		),
		'senha' => array('alphanumeric'),
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