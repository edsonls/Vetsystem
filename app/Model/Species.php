<?php
App::uses('AppModel', 'Model');
/**
 * Species Model
 *
 */
class Species extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'removed' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'active' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		// 'description' => array(
			// 'notEmpty' => array(
				// 'rule' => array('notEmpty'),
				// //'message' => 'Your custom message here',
				// //'allowEmpty' => false,
				// //'required' => false,
				// //'last' => false, // Stop validation after this rule
				// //'on' => 'create', // Limit validation to 'create' or 'update' operations
			// ),
		// ),
	);
}
