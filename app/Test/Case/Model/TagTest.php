<?php
App::uses('Tag', 'Model');

/**
 * Tag Test Case
 *
 */
class TagTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tag',
		'app.track',
		'app.award',
		'app.tags_track'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tag = ClassRegistry::init('Tag');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tag);

		parent::tearDown();
	}

	public function testTagSet() {
		$trackId = 1;
		$tags = array('ejemplo');
		$this->Tag->recursive = -1;
		$tagNotFound = $this->Tag->findByTitle('ejemplo');
		
		$resultado = $this->Tag->setTags($trackId, $tags);
		
		$tagFound = $this->Tag->findByTitle('ejemplo');
		
		$this->assertEqual(0, sizeof($tagNotFound));
		$this->assertEqual(1, sizeof($tagFound));
		
		
	}

}
