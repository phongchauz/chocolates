<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	var $helpers = array('Html','Text','Session');
	
	public $components = array('RequestHandler',
			'Session',
			'Cookie',
			'Auth' => array(
					'loginAction' => array(
							'controller' => 'auth',
							'action'     => 'login',
							'plugin'     => null
					),
					'loginRedirect' => array(
							'controller' => 'pages',
							'action'     => 'home',
							'plugin'=> null
					),
					'logoutRedirect' => array(
							'controller' => 'auth',
							'action'     => 'login',
							'plugin'=> null
					),
					'authenticate' => array(
							'Form' => array(
									'passwordHasher' => 'Blowfish',
									'fields' => array('username' => 'email'),
									'scope' => array('status' => 1)
							)
					)
			)
	);

	var $uses = array('Setting');
	
	public function beforeFilter() {
		
		$this->Auth->allow('home', 'display');
		
	}
	
	public function beforeRender() {
		$setting = $this->Setting->findById(1);
		$this->set('setting', $setting);
	}
	
	public function element($name, $data = array(), $opts = array()) {
		
		$view = new View($this, false);
		return $view->element($name, $data, $opts);
		
	}

	public static function isMobileDevice(){
		$aMobileUA = array(
			'/iphone/i' => 'iPhone',
			'/ipod/i' => 'iPod',
			'/ipad/i' => 'iPad',
			'/android/i' => 'Android',
			'/blackberry/i' => 'BlackBerry',
			'/webos/i' => 'Mobile'
		);

		//Return true if Mobile User Agent is detected
		foreach($aMobileUA as $sMobileKey => $sMobileOS){
			if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
				return true;
			}
		}
		//Otherwise return false..
		return false;
	}
	
}
