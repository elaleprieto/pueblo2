<?php
App::uses('CategoriesTrack', 'Model');

/**
 * CategoriesTrack Test Case
 *
 */
class CategoriesTrackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.categories_track',
		'app.category',
		'app.track'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CategoriesTrack = ClassRegistry::init('CategoriesTrack');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CategoriesTrack);

		parent::tearDown();
	}

}
