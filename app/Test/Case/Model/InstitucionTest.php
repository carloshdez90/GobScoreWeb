<?php
App::uses('Institucion', 'Model');

/**
 * Institucion Test Case
 *
 */
class InstitucionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.institucion',
		'app.form',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Institucion = ClassRegistry::init('Institucion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Institucion);

		parent::tearDown();
	}

}
