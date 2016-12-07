<?php

App::uses('Controller', 'CustomerPortalAppController');

class CustomerPortalController extends CustomerPortalAppController {
	
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    
    public function beforeFilter() {
    	parent::beforeFilter();    
//     	$this->Auth->allow('index');
    }

    public function index() {

    }
    
}

?>