<?php
App::uses('AppModel', 'Model');
/**
 * Delation Model
 *
 * @property DelationInfos $DelationInfos
 * @property DelationInfosDelationInstitutions $DelationInfosDelationInstitutions
 */
class Delation extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'delation_infos_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'delation_infos_delation_institutions_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'DelationInfos' => array(
			'className' => 'DelationInfos',
			'foreignKey' => 'delation_infos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DelationInfosDelationInstitutions' => array(
			'className' => 'DelationInfosDelationInstitutions',
			'foreignKey' => 'delation_infos_delation_institutions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
