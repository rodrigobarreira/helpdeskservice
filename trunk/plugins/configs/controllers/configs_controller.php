<?php
class ConfigsController extends ConfigsAppController {

	var $name = 'Configs';
	var $helpers = array('Html', 'Form');
	var $uses = array('ConfigsConfig');

	function admin_index() {
		$this->set('configs', $this->ConfigsConfig->find('all',array(
            'order' => 'ConfigsConfig.name ASC'
            )
            ));
	}

	function admin_save() {

		if (empty($this->data)) {
			$this->Session->setFlash(__('Invalid Config', true));
			$this->redirect(array('action'=>'index'));
		}

		if (!empty($this->data)) {
			//$this->Transaction->begin();
			foreach($this->data['ConfigsConfig'] as $config)
			{
				if ( strlen($config['name']) == 0 ) continue;
				$this->ConfigsConfig->create();
				if (!$this->ConfigsConfig->save($config))
				{
					$this->Session->setFlash(__('The Config could not be saved. Please, try again.', true));
					//$this->Transaction->rollback();
					$this->redirect(array('action'=>'index'));
				}
			}
			//$this->Transaction->commit();
			$this->Session->setFlash(__('The Config has been saved', true));
			$this->redirect(array('action'=>'index'));
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Config', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ConfigsConfig->del($id)) {
			$this->Session->setFlash(__('Config deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>