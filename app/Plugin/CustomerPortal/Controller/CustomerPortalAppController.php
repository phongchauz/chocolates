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
date_default_timezone_set('Asia/Ho_Chi_Minh');
App::uses('Controller', 'Controller');
Configure::load('CustomerPortal.constants');
Configure::load('CustomerPortal.config');
App::import('Vendor', 'PHPExcel', array('file' => 'PHPExcel/Classes/PHPExcel.php'));
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 * @property      CustomerPortalComponent 	  			$CustomerPortal
 */
class CustomerPortalAppController extends AppController {

    var $helpers = array('Html','Text','Session');
    var $uses    = array(
    		'User',
    		'FunctionGroup',
    		'FunctionMenu'
	);

    public $components = array(
        'Session'
        , 'Paginator'
        , 'AppService'
    );

    public function beforeFilter() {
        $authUser = $this->Session->read('Auth.User');
        $this->set('authenticateUser', $authUser);
    }

    function beforeRender() {

        $arrMenu = $this->renderMenuList();
        $this->set('arrMenu', $arrMenu);

        $actParentF = 'HO';
        $actChildF = 'HO_DA';

        $this->set('actParentF', $actParentF);
        $this->set('actChildF', $actChildF);

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

    function renderMenuList (){

        $objFunctionGroup = $this->FunctionGroup->find('all', array(
            'conditions' => array(
                'status' => STATUS_YES
            )
        ));

        $objFunctionMenu = $this->FunctionMenu->find('all', array(
            'conditions' => array(
                'status' => STATUS_YES
            )
        ));

        $arrMenu = array();
        $i = 0;



        foreach($objFunctionGroup as $funcGroup){

            $groupId   = $funcGroup['FunctionGroup']['id'];
            $groupName = $funcGroup['FunctionGroup']['name'];

            $arrFunc = array();
            $iF = 0;

            foreach($objFunctionMenu as $funcMenu){

                $funcId      = $funcMenu['FunctionMenu']['id'];
                $funcName    = $funcMenu['FunctionMenu']['name'];
                $funcCode    = $funcMenu['FunctionMenu']['code'];
                $parentId    = $funcMenu['FunctionMenu']['parent_id'];
                $funcGroupId = $funcMenu['FunctionMenu']['func_group_id'];
                $isLink      = $funcMenu['FunctionMenu']['is_link'];
                $icoClass    = $funcMenu['FunctionMenu']['ico_class'];

                if(
                    $groupId     == $funcGroupId
                    && $parentId == 0
                    && $isLink   == 0
                ){
                    $arrChildFunc = array();
                    $iCF = 0;
                    foreach($objFunctionMenu as $child){

                        if(
                            $child['FunctionMenu']['func_group_id'] == $groupId
                            && $child['FunctionMenu']['parent_id'] == $funcId
                            && $child['FunctionMenu']['is_link'] == 1
                        ){
                            $arrChildFunc[$iCF]['id']   = $child['FunctionMenu']['id'];
                            $arrChildFunc[$iCF]['name'] = $child['FunctionMenu']['name'];
                            $arrChildFunc[$iCF]['link'] = $this->urlHelper($child['FunctionMenu']['link']);
                            $iCF++;

                        }

                    }

                    $arrFunc[$iF]['id']         = $funcId;
                    $arrFunc[$iF]['code']       = $funcCode;
                    $arrFunc[$iF]['name']       = $funcName;
                    $arrFunc[$iF]['ico_class']  = $icoClass;
                    $arrFunc[$iF]['arrChild']   = $arrChildFunc;
                    $iF++;


                }
            }

            $arrMenu[$i]['id']      = $groupId;
            $arrMenu[$i]['name']    = $groupName;
            $arrMenu[$i]['arrFunc'] = $arrFunc;
            $i++;

        }

        return $arrMenu;

    }

    public function urlHelper($link) {
        $url = $link ? Configure::read('CustomerPortal.baseUrl').$link : 'javascript:;';
        return $url;
    }

}
