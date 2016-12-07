<?php

App::uses('Controller', 'CustomerPortalAppController');

class CoreDataController extends CustomerPortalAppController {
	
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    
    public function beforeFilter() {
    	parent::beforeFilter();    
//     	$this->Auth->allow('index');
    }

    public function index() {

    }

    public function chocolatesType() {

        $this->set('actParentF', 'CA');
        $this->set('actChildF', 'CA_CT');

    }

}

?>