<?php

App::uses('Controller', 'AppController');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class AuthController extends AppController {

    public $helpers = array('Html', 'Form');
    public $components = array('Session', 'RequestHandler');
    var $uses = array(
    		'User',
    );
    
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('login', 'logout');
    }
    
    public function logout() { 
    	
    	$this->Session->destroy();
    	return $this->redirect($this->Auth->logout());
    	
    }
    
    public function login() {
    	
    	$this->layout = false;
    	
        if ($this->request->is('post')) {
        	
            if ($this->Auth->login()) {
            	
            	$this->request->data['User']['password'] = '';
            	return $this->redirect($this->Auth->redirectUrl());
            	
            }else{

            	$this->request->data['User']['password'] = '';
            	$this->Session->setFlash('Invalid email or password', 'Flash/msg_error');
            	return $this->redirect($this->Auth->loginAction);
            	
            }
         
        }
        
    }

}

?>