<?php
App::uses('AppController', 'Controller');
/**
 * Quapitulos Controller
 *
 * @property Quapitulo $Quapitulo
 * @property PaginatorComponent $Paginator
 */
class QuapitulosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Quapitulo->recursive = 0;
		$this->set('quapitulos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Quapitulo->exists($id)) {
			throw new NotFoundException(__('Invalid quapitulo'));
		}
		$options = array('conditions' => array('Quapitulo.' . $this->Quapitulo->primaryKey => $id));
		$this->set('quapitulo', $this->Quapitulo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Quapitulo->create();
			if ($this->Quapitulo->save($this->request->data)) {
				$this->Session->setFlash(__('The quapitulo has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quapitulo could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Quapitulo->exists($id)) {
			throw new NotFoundException(__('Invalid quapitulo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Quapitulo->save($this->request->data)) {
				$this->Session->setFlash(__('The quapitulo has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The quapitulo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Quapitulo.' . $this->Quapitulo->primaryKey => $id));
			$this->request->data = $this->Quapitulo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Quapitulo->id = $id;
		if (!$this->Quapitulo->exists()) {
			throw new NotFoundException(__('Invalid quapitulo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Quapitulo->delete()) {
			$this->Session->setFlash(__('Quapitulo deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Quapitulo was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
