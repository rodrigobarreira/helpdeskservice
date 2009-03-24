<?php
class ChamadoHistorico extends AppModel {

	var $name = 'ChamadoHistorico';
	var $validate = array(
		'data' => array('date'),
		'hora' => array('time'),
		'chamado_id' => array('numeric'),
		'usuario_id' => array('numeric'),
		'descricao' => array('notempty')
	);

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