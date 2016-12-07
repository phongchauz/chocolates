<?php

App::uses('Controller', 'AdminPortalAppController');

class CoreDataController extends AdminPortalAppController {
	
    public $helpers = array('Html', 'Form');
    public $components = array('Session', 'CoreData');
    
    public function beforeFilter() {
    	parent::beforeFilter();    
//     	$this->Auth->allow('index');
    }

    public function index() {

    }

    public function chocolatesTypeList($pages = null,$opts = null) {


        $arrActiveMenu = $this->activeFunction('chocolatesTypeList');

        $this->set('arrActiveMenu', $arrActiveMenu);

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

        $chocolateTypeList = $this->pager($modal, $pages, $att);
        $this->set('chocolateTypeList', $chocolateTypeList);

        $arrFieldsSearch = array(
            'code'        => $this->__('Code'),
            'name'        => $this->__('Name')
        );
        $this->set('arrFieldsSearch', $arrFieldsSearch);
    }

    public function saveChocolateType() {

        $this->autoRender = false;
        $this->request->onlyAllow('ajax');
        if ($this->request->isAjax()) {

            $code       = $this->request->data['code'];
            $name       = $this->request->data['name'];
            $fieldValue = $this->request->data['fieldValue'];
            $searchValue= $this->request->data['searchValue'];

            if($code == '' || $code == null){
                $smsErr = $this->__("Code isn't valid!");
                return json_encode(array(
                    "success" => false
                    , "alert" => $smsErr
                ));
            }

            if($name == '' || $name == null){
                $smsErr = $this->__("Name isn't valid!");
                return json_encode(array(
                    "success" => false
                    , "alert" => $smsErr
                ));
            }

            $listChocolateType = $this->CoreData->getChocolateTypeList();

            $exist = $this->checkExistData($listChocolateType, 'ChocolateType', 'code', $code);

            if($exist){
                $smsErr = $this->__("Code already exist!");
                return json_encode(array(
                    "success" => false
                    , "alert" => $smsErr
                ));
            }

            $params = array();
            $params['ChocolateType']['code']         = trim($code);
            $params['ChocolateType']['status']       = 1;
            $params['ChocolateType']['name']         = trim($name);

            $params['ChocolateType'] = $this->addCreatedUser($params['ChocolateType']);
            $this->ChocolateType->create();
            $this->ChocolateType->save($params, true);

            $smsSuccess = $this->__('Save successfully');

            $contentHTML = $this->renderMainContentChocolateType($searchValue, $fieldValue);

            return json_encode(array(
                "success" => true
                , "alert" => $smsSuccess
                , "contentHTML" => $contentHTML
            ));
        }

    }

    public function deleteChocolateType(){
        $this->autoRender = false;
        $this->request->onlyAllow('ajax');
        if ($this->request->isAjax()) {

            $id  = $this->request->data['id'];
            $fieldValue = $this->request->data['fieldValue'];
            $searchValue= $this->request->data['searchValue'];

            if(!is_numeric($id)){
                return json_encode(array(
                    "success"   => false
                    , "id"      => $id
                    , "alert"   => $this->__("This chocolate type isn't valid")
                ));
            }


            $this->ChocolateType->id = $id;
            $this->ChocolateType->delete();

            $smsSuccess = $this->__('Delete successfully');
            $contentHTML = $this->renderMainContentChocolateType($searchValue, $fieldValue);

            return json_encode(array(
                "success"       => true
                , "id"          => $id
                , "alert"       => $smsSuccess
                , "contentHTML" => $contentHTML
            ));

        }
    }

    public function updateChocolateType() {

        $this->autoRender = false;
        $this->request->onlyAllow('ajax');
        if ($this->request->isAjax()) {

            $id         = (int)$this->request->data['id'];
            $code       = $this->request->data['code'];
            $name       = $this->request->data['name'];
            $status     = $this->request->data['status'];
            $fieldValue = $this->request->data['fieldValue'];
            $searchValue= $this->request->data['searchValue'];

            if($code == '' || $code == null){
                $smsErr = $this->__("Code isn't valid!");
                return json_encode(array(
                    "success" => false
                    , "alert" => $smsErr
                ));
            }

            if(!is_numeric($id)){
                $smsErr = $this->__("Chocolate type isn't valid!");
                return json_encode(array(
                    "success" => false
                    , "alert" => $smsErr
                ));
            }

            if($name == '' || $name == null){
                $smsErr = $this->__("Name isn't valid!");
                return json_encode(array(
                    "success" => false
                    , "alert" => $smsErr
                ));
            }

            $listChocolateType = $this->CoreData->getChocolateTypeList();

            $exist = $this->checkExistData($listChocolateType, 'ChocolateType', 'code', $code);

            if($exist && $exist != $id){
                $smsErr = $this->__("Code already exist!");
                return json_encode(array(
                    "success" => false
                    , "alert" => $smsErr
                ));
            }

            $params = array();
            $params['ChocolateType']['id']     = $id;
            $params['ChocolateType']['code']   = trim($code);
            $params['ChocolateType']['status'] = $status;
            $params['ChocolateType']['name']   = trim($name);

            $params['ChocolateType'] = $this->addUpdatedUser($params['ChocolateType']);
            $this->ChocolateType->id = $id;
            $this->ChocolateType->save($params, true);


            $contentHTML = $this->renderMainContentChocolateType($searchValue, $fieldValue);

            return json_encode(array(
                "success" => true
                , "contentHTML" => $contentHTML
            ));
        }

    }

    public function searchChocolateType(){
        $this->autoRender = false;
        $this->request->onlyAllow('ajax');
        if ($this->request->isAjax()) {

            $fieldValue     = $this->request->data['fieldValue'];
            $searchValue    = $this->request->data['searchValue'];
            $contentHTML    = $this->renderMainContentChocolateType($searchValue, $fieldValue);

            return json_encode(array(
                "success"       => true
                , "contentHTML" => $contentHTML
            ));

        }
    }

    public function renderMainContentChocolateType($key = null, $col = null){

        $model = 'ChocolateType';
        $this->set('model', $model);
        $parentURL = $this->renderParentURL('chocolatesTypeList');
        $this->set('currentURL', $parentURL);

        $arrOrderCommon = array($model.'.id' => 'DESC');
        $arrCondition   = array();

        if(trim($key) != '' && $key) {
            $arrCondition[] = array($model.'.'.$col.' LIKE' => '%'. $key . '%');
        }

        $att = array(
            'conditions' => $arrCondition,
            'order'      => $arrOrderCommon,
            'limit'      => DEFAULT_PAGE_SIZE
        );

        $recordNumber = $this->getRowsByPageNumber();

        $chocolateTypeList = $this->pager($model, null, $att);

        return $this->element(
            $this->plugin.'.CoreData/main_content_chocolate_type'
            , array(
                'chocolateTypeList' => $chocolateTypeList
                , 'recordNum'       => $recordNumber
            )
        );
    }

}

?>