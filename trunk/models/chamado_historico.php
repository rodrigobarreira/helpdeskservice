<?php
class ChamadoHistorico extends AppModel {

	var $name = 'ChamadoHistorico';
	
	var $validate = array(
		'descricao' => array(
			'rule' => 'notEmpty',
			'message' => 'Campo de preenchimento Obrigatório'
			),
	);
	
	var $recursive = 1;
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Chamado' => array('className' => 'Chamado',
								'foreignKey' => 'chamado_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
								),
			'Usuario' => array('className' => 'Usuario',
								'foreignKey' => 'usuario_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
								)
								);

}
?>