<?php
App::uses('Mensaje', 'Model');

/**
 * Mensaje Test Case
 *
 */
class MensajeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.mensaje',
		'app.denuncia',
		'app.institucion',
		'app.form',
		'app.question',
		'app.answer',
		'app.user',
		'app.calificacion'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Mensaje = ClassRegistry::init('Mensaje');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Mensaje);

		parent::tearDown();
	}

}
