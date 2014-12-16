<?php
App::uses('Denuncia', 'Model');

/**
 * Denuncia Test Case
 *
 */
class DenunciaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.denuncia',
		'app.institucion',
		'app.form',
		'app.question',
		'app.answer',
		'app.user',
		'app.calificacion',
		'app.mensaje'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Denuncia = ClassRegistry::init('Denuncia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Denuncia);

		parent::tearDown();
	}

}
