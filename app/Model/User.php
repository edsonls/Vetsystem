<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'username' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		
		'image' => array(
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Something went wrong with the file upload',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
				'mimeType' => array(
						'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg')),
						'message' => 'Invalid file, only images allowed',
						'required' => FALSE,
						'allowEmpty' => TRUE,
					),
			// custom callback to deal with the file upload
			'processUpload' => array(
				'rule' => 'processUpload',
				'message' => 'Something went wrong processing your file',
				'required' => FALSE,
				'allowEmpty' => TRUE,
				'last' => TRUE,
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
		/**
	 * parentNode
	 *
	 * @return void
	 **/	
    public function parentNode() {
            if (!$this->id && empty($this->data)) {
                return null;
            }
            if (isset($this->data['User']['group_id'])) {
                $groupId = $this->data['User']['group_id'];
            } else {
                $groupId = $this->field('group_id');
            }
            if (!$groupId) {
                return null;
            } else {            	
                return array('Group' => array('id' => $data['User']['group_id']));
            }
    }

    /**
     * bindNode
     *
     * @return void
     **/
    public function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['Admin.User']['group_id']);
    }
	///////////////////////////////////////////arquivos

/**
 * Upload Directory relative to WWW_ROOT
 * @param string
 */
		public $uploadDir = 'img/avatars';

/**
 * Process the Upload
 * @param array $check
 * @return boolean
 */
public function processUpload($check=array()) {
	// deal with uploaded file
	if (!empty($check['image']['tmp_name'])) {

		// check file is uploaded
		if (!is_uploaded_file($check['image']['tmp_name'])) {
			return FALSE;
		}

		// build full filename
		$image = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(pathinfo($check['image']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['image']['name'], PATHINFO_EXTENSION);

		// @todo check for duplicate filename

		// try moving file
		if (!move_uploaded_file($check['image']['tmp_name'], $image)) {
			return FALSE;

		// file successfully uploaded
		} else {
			// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
			$this->data[$this->alias]['filepath'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $image) );
		}
	}

	return TRUE;
}
/**
 * Before Validation
 * @param array $options
 * @return boolean
 */
public function beforeValidate($options = array()) {
	// ignore empty file - causes issues with form validation when file is empty and optional
	if (!empty($this->data[$this->alias]['image']['error']) && $this->data[$this->alias]['image']['error']==4 && $this->data[$this->alias]['image']['size']==0) {
		unset($this->data[$this->alias]['image']);
	}

	parent::beforeValidate($options);
}

    public function beforeSave($options = array()) {
        if ( !empty( $this->data['User']['password'] ) ) {
            $this->data['User']['password'] = AuthComponent::password(
                      $this->data['User']['password']
                    );
            $this->data["User"]['status'] = 1;
        }
		if (!empty($this->data[$this->alias]['filepath'])) {
		$this->data[$this->alias]['image'] = $this->data[$this->alias]['filepath'];
	}
	return parent::beforeSave($options);
    }
	
	/**
	 * validate_password_again
	 *
	 * @return void
	 **/
	public function validate_password_again() {
	if (isset($this->data['User']['password'])) {
		if ($this->data['User']['password'] != $this->data['User']['password_again']) {
			return false;
		}
	}
	return true;
	}
/**
 * Before Save Callback
 * @param array $options
 * @return boolean
 */
/*public function beforeSave($options = array()) {
	// a file has been uploaded so grab the filepath
	if (!empty($this->data[$this->alias]['filepath'])) {
		$this->data[$this->alias]['file'] = $this->data[$this->alias]['filepath'];
	}
	
	return parent::beforeSave($options);
}*/
}
