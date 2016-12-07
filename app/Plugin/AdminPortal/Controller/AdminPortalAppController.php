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
Configure::load('AdminPortal.constants');
Configure::load('AdminPortal.config');
App::import('Vendor', 'PHPExcel', array('file' => 'PHPExcel/Classes/PHPExcel.php'));
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 * @property      CoreDataComponent 	  			$CoreData
 */
class AdminPortalAppController extends AppController {

    var $helpers = array('Html','Text','Session');
    var $uses    = array(
    		'User',
    		'ChocolateType',
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

        /*$arrActiveMenu = array(
            'group_menu'    => 'HO'
            , 'child_menu'  => ''
        );*/

//        $this->set('arrActiveMenu', $arrActiveMenu);
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
            $groupCode = $funcGroup['FunctionGroup']['code'];
            $groupName = $funcGroup['FunctionGroup']['name'];
            $icoClass  = $funcGroup['FunctionGroup']['ico_class'];

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
                $link        = $funcMenu['FunctionMenu']['link'];

                if($groupId != $funcGroupId){continue;}

                $arrFunc[$iF]['id']         = $funcId;
                $arrFunc[$iF]['code']       = $funcCode;
                $arrFunc[$iF]['name']       = $funcName;
                $arrFunc[$iF]['ico_class']  = $icoClass;
                $arrFunc[$iF]['arrLink']    = explode('/', $link);
                $iF++;

            }

            $arrMenu[$i]['id']          = $groupId;
            $arrMenu[$i]['code']        = $groupCode;
            $arrMenu[$i]['name']        = $groupName;
            $arrMenu[$i]['ico_class']   = $icoClass;
            $arrMenu[$i]['arrFunc']     = $arrFunc;
            $i++;

        }

        return $arrMenu;

    }

    public function urlHelper($link) {
        $url = $link ? Configure::read('CustomerPortal.baseUrl').$link : 'javascript:;';
        return $url;
    }

    public function __($value){
        return $value;
    }

    public function formatDate($date){

        $format = 'm/d/Y';
        $lang = $this->getLangKey();
        switch($lang) {
            case 'ja-jp':

                break;
            case 'vi-vn':
                $format = 'd/m/Y';
                break;

        }

        $date = date_format(date_create($date), $format);

        return $date;

    }

    public function reformatDate($date){

        if($date == '' || $date == null || $date == '00-00-0000' || $date == '00/00/0000'){
            return '0000-00-00';
        }

        $arrDate = explode('/', $date);
        $type = ($this->getLangKey() == 'vi-vn') ? 1 : 0;
        $temp =($type == 1) ? $arrDate[2].'-'.$arrDate[1].'-'.$arrDate[0] : $arrDate[2].'-'.$arrDate[0].'-'.$arrDate[1];

        return $temp;

    }

    public function getLangKey($key = null) {
        if (!$key) {
            if (is_object($this->Session)) {
                $key = $this->Session->read('Language.Key');
            }
            if (!$key) {
                $multipleLanguage = $this->Languages->find('all', array(
                    'conditions' => array('Languages.active' => 1)
                ));
                foreach ($multipleLanguage as $language) {
                    if ($language['Languages']['is_default'] == 1) {
                        $key = $language['Languages']['language_key'];
                    }
                }
            }
            if (is_object($this->Session)) {
                $this->Session->write('Language.Key', $key);
            }
        }

        return $key;
    }



    public function decodeData($content) {
        if ($content) {
            $content = json_decode($content);
        }
        return $content;
    }

    public function encodeData($arrData) {
        $contentJson = null;
        if (is_array($arrData)) {
            $contentJson = json_encode($arrData, 256);
        }
        return $contentJson;
    }

    /*
     * key is language_key
     */
    public function decodeByLang($content, $key = null) {
        $dataDecode = "";
        if ($content) {
            $key = $this->getLangKey($key);
            $contentObj = json_decode($content);
            $dataDecode = isset($contentObj->{$key}) ? $contentObj->{$key} : (current($contentObj));
        }

        if($dataDecode == '' && $content != ''){
            $defaultLangKey = self::getDefaultLangKey();
            $contentObj = json_decode($content);
            $dataDecode = isset($contentObj->{$defaultLangKey}) ? $contentObj->{$defaultLangKey} : (current($contentObj));

        }

        return $dataDecode;
    }

    public function addCreatedUser($arrData) {
        $arr = array(
            'created_user' => 1,
            'updated_user' => 1
        );
        return array_merge($arrData, $arr);
    }

    public function addUpdatedUser($arrData) {
        $arr = array('updated_user' => 1);
        return array_merge($arrData, $arr);
    }

    public function getDefaultLangKey(){
        $settingOption = $this->KsCategory->getSettingData();
        $isMultiLang = $settingOption['Setting']['multiple_language'] == 1 ? true : false;

        if($isMultiLang){
            $language = $this->Languages->find('first', array(
                'conditions' => array('Languages.is_default' => 1)
            ));
            return $language['Languages']['language_key'];
        }

        return $settingOption['Setting']['default_language_key'];
    }

    public function pager($table, $page = '', $att = array(), $pager = '') {

        if(!$att) {
            $att = array(
                'order' => array('id' => 'desc')
            );
        }

        if(!$pager) {
            $pager = DEFAULT_PAGE_SIZE;
        }

        if(!$page) {
            $page = Configure::read('START_PAGE');
        }

        $att['limit'] = $pager;
        $att['page']  = $page;

        $this->Paginator->settings = $att;


        return $this->Paginator->paginate($table);
    }

    public function getRowsByPageNumber() {
        $named = $this->request->named;
        $rowNumber = isset($named['page']) == null ? 0 : ($named['page'] - 1)  * Configure::read('PAGER');

        return $rowNumber;
    }

    public function compareString($str, $strCompare) {
        return (strtolower(trim($str)) == strtolower(trim($strCompare))) ? true : false;
    }

    public function renderParentURL($parentFunction){

        $listFunction = $this->FunctionMenu->find(
            'all', array(
                'fields'    => array(
                    'FunctionMenu.*'
                )
            )
        );

        foreach($listFunction as $function){

            $link = $function['FunctionMenu']['link'];
            $arrFunc = explode('/', $link);

            if(isset($arrFunc[2]) && $this->compareString($arrFunc[2], $parentFunction)){
                return $function['FunctionMenu']['link'];
            }
        }

        return '';

    }

    public function checkExistData($listObject, $model, $column, $key){
        foreach($listObject as $object){
            if($this->compareString($object[$model][$column], $key)){
                return $object[$model]['id'];
            }
        }
        return false;
    }

    public function activeFunction($func){
        $listFunction = $this->FunctionMenu->find(
            'all', array(
                'fields'    => array(
                    'FunctionMenu.*'
                )
                , 'conditions' => array('FunctionMenu.status' => STATUS_YES)
            )
        );

        $objFunctionGroup = $this->FunctionGroup->find('all', array(
            'conditions' => array(
                'status' => STATUS_YES
            )
        ));

        $groupCode = '';
        $groupId = '';
        $funcCode = '';

        foreach($listFunction as $function){
            if($this->compareString(explode('/', $function['FunctionMenu']['link'])[2], $func)){
                $funcCode = $function['FunctionMenu']['code'];
                $groupId = $function['FunctionMenu']['func_group_id'];
                break;
            }
        }

        foreach($objFunctionGroup as $groupMenu){
            if($groupMenu['FunctionGroup']['id'] == $groupId){
                $groupCode = $groupMenu['FunctionGroup']['code'];
                break;
            }
        }

        return array(
            'group_menu'    => $groupCode
            , 'child_menu'  => $funcCode
        );

    }

}
