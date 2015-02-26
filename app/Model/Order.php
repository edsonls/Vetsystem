<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property Animal $Animal
 * @property Clinic $Clinic
 * @property Veterinarian $Veterinarian
 * @property PaymentMethod $PaymentMethod
 * @property CashFlow $CashFlow
 * @property Examination $Examination
 */
 
 
class Order extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'animal_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'clinic_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'veterinarian_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'payment_method_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),'file' => array(
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Something went wrong with the file upload',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
			'mimeType' => array(
				'rule' => array('extension',
            					array('pdf', 'docx', 'doc', 'xlsx')),
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
		'Animal' => array(
			'className' => 'Animal',
			'foreignKey' => 'animal_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Clinic' => array(
			'className' => 'Clinic',
			'foreignKey' => 'clinic_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Veterinarian' => array(
			'className' => 'Veterinarian',
			'foreignKey' => 'veterinarian_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PaymentMethod' => array(
			'className' => 'PaymentMethod',
			'foreignKey' => 'payment_method_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'CashFlow' => array(
			'className' => 'CashFlow',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Examination' => array(
			'className' => 'Examination',
			'joinTable' => 'examinations_orders',
			'foreignKey' => 'order_id',
			'associationForeignKey' => 'examination_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
///////////////////////////////////////////arquivos
/**
 * Before Validation
 * @param array $options
 * @return boolean
 */
public function beforeValidate($options = array()) {
	// ignore empty file - causes issues with form validation when file is empty and optional
	if (!empty($this->data[$this->alias]['file']['error']) && $this->data[$this->alias]['file']['error']==4 && $this->data[$this->alias]['file']['size']==0) {
		unset($this->data[$this->alias]['file']);
	}

	parent::beforeValidate($options);
}

/**
 * Upload Directory relative to WWW_ROOT
 * @param string
 */
		public $uploadDir = 'uploads';

/**
 * Process the Upload
 * @param array $check
 * @return boolean
 */
public function processUpload($check=array()) {
	// deal with uploaded file
	if (!empty($check['file']['tmp_name'])) {

		// check file is uploaded
		if (!is_uploaded_file($check['file']['tmp_name'])) {
			return FALSE;
		}

		// build full filename
		$file = WWW_ROOT . $this->uploadDir . DS . Inflector::slug(pathinfo($check['file']['name'], PATHINFO_FILENAME)).'.'.pathinfo($check['file']['name'], PATHINFO_EXTENSION);

		// @todo check for duplicate filename

		// try moving file
		if (!move_uploaded_file($check['file']['tmp_name'], $file)) {
			return FALSE;

		// file successfully uploaded
		} else {
			// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
			$this->data[$this->alias]['filepath'] = str_replace(DS, "/", str_replace(WWW_ROOT, "", $file) );
		}
	}

	return TRUE;
}
/**
 * Before Save Callback
 * @param array $options
 * @return boolean
 */
public function beforeSave($options = array()) {
	// a file has been uploaded so grab the filepath
	if (!empty($this->data[$this->alias]['filepath'])) {
		$this->data[$this->alias]['file'] = $this->data[$this->alias]['filepath'];
	}
	
	return parent::beforeSave($options);
}


}
