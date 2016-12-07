<?php

App::uses('Controller', 'AdminAppController');

class SettingController  extends AdminAppController
{
	
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    
    public function beforeFilter() {
    	parent::beforeFilter();    	
    }

    public function option() {

    	if ($this->request->is('post') || $this->request->is('put')) {

    		$params = $this->request->data;
    		$params['Setting']['id'] = 1;
    		if ($this->Setting->save($params, true)) {
    			$this->setFlash('Setting options has been saved');
    		} else {
    			$this->set('errors', $this->Setting->validationErrors);
    		}
    		
    		$this->redirect($this->referer());
    		
    	}else{
    		$this->data = $this->Setting->find('first',array(
				'fields' => array('Setting.*'),
				'conditions' => array('Setting.id' => 1)
			));

			$this->set('setting', $this->data);
    	}

    }
   
}

?>