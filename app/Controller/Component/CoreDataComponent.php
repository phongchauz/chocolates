<?php

App::uses('Component', 'Controller');

class CoreDataComponent extends Component {

    // the other component your component uses
    public $components = array('Existing');
	/**
	 * @var Model
	 */

	public $ChocolateType;

	public function initialize(Controller $controller) {
        //Register Model

		$this->ChocolateType  = ClassRegistry::init('ChocolateType');
	}

	public function getChocolateTypeList($arrCondition = null) {

		$arrCondition = !$arrCondition ? array() : $arrCondition;

		return $this->ChocolateType->find('all', array(
			'fields'    => array(
				'ChocolateType.*'
			), 'conditions' => $arrCondition
		));
	}

}

?>
