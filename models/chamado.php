<?php
class Chamado extends AppModel {

	var $name = 'Chamado';
	var $validate = array(
		'setor_id' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Selecione uma área'
			),
		'problema_id' => array(
			'rule' => VALID_NOT_EMPTY,
			'message' => 'Selecione o Tipo de Problema'
			),
		'titulo' => array(
			'titulo_em_branco' => array(
				'rule' => array('minLength', 5),
				'message' => 'Informe um título para o problema com no mínimo 5 letras'
				)
				),
		'usuario_id' => array('numeric'),
				//'data_hora_abertura' => array('date'),
		'aberto_por' => array('numeric'),
		'descricao_problema' => array(
			'descricao_em_branco' => array(
				'rule' => array('minLength', 10),
				'message' => 'Informe uma descrição para o problema com no mínimo 10 letras'
				),
				),
		'status_id' => array('numeric'),
				);

				var $recursive = 0;
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
								'dependent' => true,
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