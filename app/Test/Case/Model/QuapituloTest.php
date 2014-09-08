<?php
App::uses('Quapitulo', 'Model');

/**
 * Quapitulo Test Case
 *
 */
class QuapituloTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.quapitulo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Quapitulo = ClassRegistry::init('Quapitulo');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Quapitulo);

		parent::tearDown();
	}

}
