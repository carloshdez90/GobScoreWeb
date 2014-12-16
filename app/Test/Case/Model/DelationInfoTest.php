<?php
App::uses('DelationInfo', 'Model');

/**
 * DelationInfo Test Case
 *
 */
class DelationInfoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.delation_info',
		'app.delation_institutions'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->DelationInfo = ClassRegistry::init('DelationInfo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->DelationInfo);

		parent::tearDown();
	}

}
