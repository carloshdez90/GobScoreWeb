<?php
App::uses('InstitutionAnswer', 'Model');

/**
 * InstitutionAnswer Test Case
 *
 */
class InstitutionAnswerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.institution_answer',
		'app.delations',
		'app.delations_delation_infos',
		'app.delations_delation_infos_delation_institutions'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->InstitutionAnswer = ClassRegistry::init('InstitutionAnswer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->InstitutionAnswer);

		parent::tearDown();
	}

}
