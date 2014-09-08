<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Track $Track
 */
class Tag extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'title' => array('notempty' => array('rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			), ),
		'titulo' => array('notempty' => array('rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			), ),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array('Track' => array(
			'className' => 'Track',
			'joinTable' => 'tags_tracks',
			'foreignKey' => 'tag_id',
			'associationForeignKey' => 'track_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		));

	public function setTags($trackId = null, $tags = null) {
		if($trackId && $tags) {
			foreach ($tags as $tag) {
				if($tag != '') {
					$etiqueta = $this->findByTitle($tag);
					
					if($etiqueta) {
						$data['Tag']['id'] = $etiqueta['Tag']['id'];
					}
					else {
						$data['Tag']['title'] = $tag; 
					}
					$data['Track']['id'] = $trackId;
					
					$this->create();
					$this->save($data);
				}
			}
		}
	}

}
