<?php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	
	public $useTable = 'user';

    public $name = "User";
    public $primaryKey = 'id';
    
    public $virtualFields = array(
    		'full_name' => 'CONCAT(User.fullname, " - ", User.email)'
    );
    
	public $validate = array(
			'email' => array(
                'required' => array(
                    'rule' => array('notBlank'),
                    'message' => 'A email address is required'
                ),
                'unique' => array(
                    'rule' => 'uniqueEmail',
                    'message' => 'Error! This email already exists.',
                    'on' => array('create','update')
                )
			),
			'fullname' => array(
					'required' => array(
							'rule' => array('notBlank'),
							'message' => 'A fullname is required'
					),
					'between' => array(
							'rule'    => array('lengthBetween', 1, 100),
							'message' => 'fullname is between 1 to 100 characters'
					)
			),
			'password' => array(
                'required' => array(
                    'rule' => array('notBlank'),
                    'message' => 'A password is required',
                    'on' => 'create'
                ),
                'between' => array(
                    'rule'    => array('lengthBetween', 6, 20),
                    'message' => 'Password is between 6 to 20 characters'
                )
            ),
            'confirm_password' => array(
                'compare'    => array(
                    'rule'    => array('validate_passwords'),
                    'message' => 'The passwords you entered do not match.',
                )
            )
	);
	
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
					$this->data[$this->alias]['password']
			);
		}
		return true;
	}

    public function uniqueEmail() {
        return ($this->find('count', array('conditions' =>array($this->alias . '.email' => $this->data[$this->alias]['email']))) == 0);
    }
        
    public function validate_passwords() {
        return $this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password'];
    }
}

?>