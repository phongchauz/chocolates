<?php

App::uses('Component', 'Controller');

class CustomerPortalComponent extends Component {
	
    // the other component your component uses
    public $components = array('Existing');
	/**
	 * @var Model
	 */

//	public $KsGoalScale;

	public function initialize(Controller $controller) {
        //Register Model

//		$this->KsDepartment  	 = ClassRegistry::init('KpiStandard.KsDepartment');
	}

	public function functionById($id) {
		return $this->BscFunction->find('first', array(
			'conditions' => array(
				'id'     => $id,
				'status' => STATUS_YES
			)
		));
	}

	/**
	 * @param $moduleId
	 * @param null $ids
	 * @return array|null
	 */
	/*public function menuListByModuleId($moduleId, $ids = null) {
		$conditions = array(
			'module_id' => $moduleId,
			'type'      => TYPE_INPUT,
			'status'    => STATUS_YES,

		);
		if ($ids) {
			$conditions['id'] = $ids;
		}

		return $this->BscFunction->find('all', array(
			'conditions' => $conditions
		));
	}*/



}

?>
