<?php

App::uses('Controller', 'AdminAppController');

class BannerController  extends AdminAppController
{
	
    public $helpers = array('Html', 'Form');
    public $components = array('Session');
    
    public function beforeFilter() {
    	parent::beforeFilter();    	
    }

    public function index() {

    	if($this->request->is('ajax')){
    		
	    	$this->autoRender = false;
	    	
	    	$data = array();
	    	$conditions = array(
	    			"Banner.is_active" => 1,
	    	);
	    	
	    	$listBanner = $this->Banner->find('all', array(
	    			"conditions" => $conditions,
	    			"limit" => $this->request->data['length'],
	    			"offset" => $this->request->data['start']
	    	));
	    	
	    	$countData = $this->Banner->find('count', array(
	    			"conditions" => $conditions,
	    	));


	    	foreach($listBanner as $banner){

				$locationType = $this->renderLocationName($banner['Banner']['location_type']);
				$banner['Banner']['location_type'] = $locationType;
	    		array_push($data, $banner['Banner']);
	    		
	    	}
	    	
	    	return json_encode(array("data" => $data, "recordsTotal" => $countData, "recordsFiltered" => $countData ));
	    	
    	}
    	
    }
    
    public function add() {
    	$this->autoRender = false;
    	$params = $this->request->data;
    	$action = isset($params['action']) ? $params['action'] : '';
		$arrLocationType = Configure::read('LOCATION_TYPE');

    	if ($this->request->is('post') && $action != "get") {
    		
    		$this->Banner->create();
    		$file = $params['Banner']['picture_file'];
    		$params['Banner']['picture'] = $file['name'];
    		$params['Banner']['type'] = $params['typeBanner'];
			$params['Banner']['location_type'] = isset($params['location_type']) ? $params['location_type'] : 0;

			if($params['Banner']['type'] == 0 && $file['size'] == 0){
				return json_encode(array("success" => false, "message" => 'Please upload picture before save !'));
			} else {
				if($params['Banner']['type'] == 0){
					unset($params['Banner']['link_video']);
				} else {
                    $params['Banner']['location_type'] = 1;
                }
				if ($this->Banner->save($params, true)) {
					$id = $this->Banner->getInsertID();
					if($params['Banner']['type'] == 1 && $params['Banner']['main'] == 1){
						$this->updateMainVideoBanner($id, $params['Banner']['location_type']);
					}

					if (!empty($file) && $file['size'] > 0) {

						$this->AppService->uploadFilesAjax($file, "Banner/".$id."/");
						$this->AppService->copyFileUpload("Banner/".$id."/", $file['name']);

					}

					$params['Banner']['id'] = $id;
					return json_encode(array("success" => true, "message" => 'Banner has been added', "data" => $params['Banner'], "action" => "add"));

				} else {

					$errors = $this->Banner->validationErrors;
					return json_encode(array("success" => false, "error" => $errors));

				}
			}


    	}else{
    		
    		$contentHtml = $this->element('Admin.Banner/_form', array('arrLocationType' => $arrLocationType, 'locationType' => -1));
    		return json_encode(array('success' => true, 'contentHtml' => $contentHtml));
    		 
    	}
    
    }
    
    public function edit($id = null) {
    
    	$this->autoRender = false;
    	$params = $this->request->data;
    	$action = isset($params['action']) ? $params['action'] : '';
    
    	if (($this->request->is('post') || $this->request->is('put')) && $action != "get") {
    		
    		$oldFilename = $params['Banner']['picture'];
    		$file = $params['Banner']['picture_file'];
    		
    		if($file['name'] != "" && $file['name'] != null){
    			
    			$params['Banner']['picture'] = $file['name'];
    			
    		}
			$params['Banner']['location_type'] = isset($params['location_type']) ? $params['location_type'] : '';
    		$this->Banner->id = $id;

            if($params['typeBanner'] == 1){
                $params['Banner']['location_type'] = 1;
            }
    
    		if($params) {

    			if ($this->Banner->save($params, true)) {
					if($params['typeBanner'] == 1 && $params['Banner']['main'] == 1){
						$this->updateMainVideoBanner($id,$params['Banner']['location_type']);
					}

    				if (!empty($file) && $file['size'] > 0) {
    					
    					if($oldFilename != "" && $oldFilename != null){
    						$destination_file =  WWW_ROOT."uploads/Banner/".$id."/".$oldFilename;
    						$this->AppService->deleteFiles($destination_file);

							$destination_file =  WWW_ROOT."uploads/Banner/".$id."/Mobile/".$oldFilename;
							$this->AppService->deleteFiles($destination_file);
    					}
    						
    					$this->AppService->uploadFilesAjax($file, "Banner/".$id."/");
						$this->AppService->copyFileUpload("Banner/".$id."/", $file['name']);
    				
    				}
    
    				$params['Banner']['id'] = $id;
    				return json_encode(array("success" => true, "message" => 'Banner info has been saved', "data" => $params['Banner'], "action" => "edit"));
    
    			} else {
    
    				$errors = $this->Banner->validationErrors;
    				return json_encode(array("success" => false, "error" => $errors));
    
    			}
    		}
    
    	}else{
    
    		if($id) {
    
    			$banner = $this->Banner->findById($id);
    			$this->data = $banner;
				$type = $banner['Banner']['type'];
				$arrLocationType = Configure::read('LOCATION_TYPE');
				$locationType = isset($banner['Banner']['location_type']) ? $banner['Banner']['location_type'] : -1;
    			$contentHtml = $this->element('Admin.Banner/_form', array(
					'id' => $id,
					'type' => $type,
					'locationType' => $locationType,
					'arrLocationType' => $arrLocationType,
				));
    			return json_encode(array('success' => true, 'contentHtml' => $contentHtml));
    
    		} else {
    
    			return json_encode(array("success" => false));
    
    		}
    
    	}
    
    }
    
    public function delete($id = null) {
    
    	$this->autoRender = false;
    	$this->request->allowMethod('post');
    	
    	$banner = $this->Banner->findById($id);
    
    	$this->Banner->id = $id;
    
    	if ($this->Banner->delete()) {
    		
    		if($banner['Banner']['picture'] != "" && $banner['Banner']['picture'] != null){
    			$destination_path =  WWW_ROOT."uploads/Banner/".$id;
    			$this->AppService->deleteFiles($destination_path);
    		}
    		 
    		return json_encode(array("success" => true));
    
    	} else {
    
    		return json_encode(array("success" => false));
    
    	}
    
    }

	public function updateMainVideoBanner($id, $position){
		$sql = 'UPDATE `banner`
				SET `main`= 0
				WHERE id <> '.$id.'
				AND location_type = '.$position;
		$this->Banner->query($sql);
	}
   
}

?>