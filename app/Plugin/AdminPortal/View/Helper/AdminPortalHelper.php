<?php

App::uses('Helper', 'View');
App::import('Helper', 'Bsc.Bsc');

class AdminPortalHelper extends Helper {
    public function __($value){
        return $value;
    }

    public function renderStatus($value){
        return $value == 0 ? self::__('Lock') : self::__('Active');
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

        return 'vi-vn';

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

    public function setFlash($mess, $key = null, $type = 'default') {
        if($key) {
            $this->Session->setFlash($mess, $type, array(), $key);
        } else {
            $this->Session->setFlash($mess);
        }
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

    public function getUserId(){

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

    public function compareString($str, $strCompare) {
        return (strtolower(trim($str)) == strtolower(trim($strCompare))) ? true : false;
    }

}
