<?php
App::uses('Form', 'Model');

/**
 * Form Test Case
 *
 */
class FormTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.form',
		'app.institucion',
		'app.user',
		'app.question'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Form = ClassRegistry::init('Form');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Form);

		parent::tearDown();
	}

}
