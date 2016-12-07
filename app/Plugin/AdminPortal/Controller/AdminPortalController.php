<?php

App::uses('Controller', 'CustomerPortalAppController');

class AdminPortalController extends AdminPortalAppController {
	
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