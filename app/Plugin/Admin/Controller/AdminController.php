<?php

App::uses('Controller', 'AdminAppController');

class AdminController extends AdminAppController {
	
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