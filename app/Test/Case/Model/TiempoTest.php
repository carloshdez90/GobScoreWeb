<?php
App::uses('Tiempo', 'Model');

/**
 * Tiempo Test Case
 *
 */
class TiempoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tiempo',
		'app.institucion',
		'app.form',
		'app.question',
		'app.answer',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tiempo = ClassRegistry::init('Tiempo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tiempo);

		parent::tearDown();
	}

}
