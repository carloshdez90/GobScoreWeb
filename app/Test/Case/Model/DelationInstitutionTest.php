<?php
App::uses('DelationInstitution', 'Model');

/**
 * DelationInstitution Test Case
 *
 */
class DelationInstitutionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.delation_institution'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DelationInstitution = ClassRegistry::init('DelationInstitution');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DelationInstitution);

		parent::tearDown();
	}

}
