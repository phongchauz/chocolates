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
class AdminAppController extends AppController {

    var $helpers = array('Html','Text','Session');
    var $uses    = array(
    		'User',
    		'Banner',
            'Setting'
	);

    public $components = array('Session', 'Paginator', 'AppService');

    public function beforeFilter() {
    	
    }

    function beforeRender() {
    	
    }

    public function getSession() {
        return $this->Session;
    }


    public function setFlash($mess, $key = null, $type = 'default') {
        if($key) {
            $this->getSession()->setFlash($mess, $type, array(), $key);
        } else {
            $this->getSession()->setFlash($mess);
        }
    }

    public function renderLocationName($key = null) {
        $name = '';
        if($key) {
            $arrLocationType = Configure::read('LOCATION_TYPE');

            foreach($arrLocationType as $locType){
                if($locType['id'] == $key){
                    $name = $locType['name'];
                    break;
                }
            }
        }

        return $name;
    }

    public function getRowsByPageNumber() {
        $named = $this->request->named;
        $rowNumber = isset($named['page']) == null ? 0 : ($named['page'] - 1)  * Configure::read('PAGER');

        return $rowNumber;
    }

}
