<?php
App::uses('AppModel', 'Model');
/**
 * InstitutionAnswer Model
 *
 * @property Delations $Delations
 * @property DelationsDelationInfos $DelationsDelationInfos
 * @property DelationsDelationInfosDelationInstitutions $DelationsDelationInfosDelationInstitutions
 */
class InstitutionAnswer extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'delations_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'delations_delation_infos_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'delations_delation_infos_delation_institutions_id' => array(
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
		'Delations' => array(
			'className' => 'Delations',
			'foreignKey' => 'delations_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DelationsDelationInfos' => array(
			'className' => 'DelationsDelationInfos',
			'foreignKey' => 'delations_delation_infos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DelationsDelationInfosDelationInstitutions' => array(
			'className' => 'DelationsDelationInfosDelationInstitutions',
			'foreignKey' => 'delations_delation_infos_delation_institutions_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
