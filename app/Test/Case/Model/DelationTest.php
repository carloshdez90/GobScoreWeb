<?php
App::uses('Delation', 'Model');

/**
 * Delation Test Case
 *
 */
class DelationTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.delation',
		'app.delation_infos',
		'app.delation_infos_delation_institutions'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Delation = ClassRegistry::init('Delation');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Delation);

		parent::tearDown();
	}

}
