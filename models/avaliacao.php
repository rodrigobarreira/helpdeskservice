<?php
class Avaliacao extends AppModel {

	var $name = 'Avaliacao';
	var $validate = array(
		'data_hora' => array('date'),
		'nivel' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
			'Chamado' => array('className' => 'Chamado',
								'foreignKey' => 'chamado_id',
								'conditions' => '',
								'fields' => '',
								'order' => ''
			)
	);

}
?>