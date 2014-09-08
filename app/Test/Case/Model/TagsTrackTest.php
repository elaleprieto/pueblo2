<?php
App::uses('TagsTrack', 'Model');

/**
 * TagsTrack Test Case
 *
 */
class TagsTrackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tags_track',
		'app.tag',
		'app.track',
		'app.award'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TagsTrack = ClassRegistry::init('TagsTrack');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TagsTrack);

		parent::tearDown();
	}

}
