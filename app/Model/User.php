<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {
	public $validate = array(
		'username' => array('required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Se requiere un nombre de usuario'
			)),
		'password' => array('required' => array(
				'rule' => array('notEmpty'),
				'message' => 'Se requiere una contraseña'
			)),
		'role' => array('valid' => array(
				'rule' => array(
					'inList',
					array(
						'admin',
						'usuario'
					)
				),
				'message' => 'Ingrese un rol válido',
				'allowEmpty' => false
			))
	);

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array('Rol' => array(
			'className' => 'Rol',
			'foreignKey' => 'rol_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		));

	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
		}
		return true;
	}

}
