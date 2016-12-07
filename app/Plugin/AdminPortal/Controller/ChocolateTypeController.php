<?php

App::uses('Controller', 'AdminPortalAppController');

class ChocolateTypeController extends AdminPortalAppController {
	
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    
    public function beforeFilter() {
    	parent::beforeFilter();    
//     	$this->Auth->allow('index');
    }

    public function index() {

    }

    public function chocolatesTypeList($pages = null,$opts = null) {

        $this->set('actParentF', 'CA');
        $this->set('actChildF', 'CA_CT');
        $modal = 'ChocolateType';
        $this->set('model', $modal);

        $arrOrderCommon = array($modal.'.id' => 'DESC');
        $arrCondition   = array();

        $att = array(
            'conditions' => $arrCondition,
            'order'      => $arrOrderCommon,
            'limit'      => DEFAULT_PAGE_SIZE
        );

        $recordNumber = $this->getRowsByPageNumber();
        $this->set('recordNum', $recordNumber);

        $chocolateTypeList = $this->pager('ChocolateType', $pages, $att);
        $this->set('chocolateTypeList', $chocolateTypeList);

    }

}

?>