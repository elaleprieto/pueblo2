<?php
App::uses('AppController', 'Controller');
/**
 * CategoriesTracks Controller
 *
 * @property CategoriesTrack $CategoriesTrack
 * @property PaginatorComponent $Paginator
 */
class CategoriesTracksController extends AppController {

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
		$this->CategoriesTrack->recursive = 0;
		$this->set('categoriesTracks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CategoriesTrack->exists($id)) {
			throw new NotFoundException(__('Invalid categories track'));
		}
		$options = array('conditions' => array('CategoriesTrack.' . $this->CategoriesTrack->primaryKey => $id));
		$this->set('categoriesTrack', $this->CategoriesTrack->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CategoriesTrack->create();
			if ($this->CategoriesTrack->save($this->request->data)) {
				$this->Session->setFlash(__('The categories track has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories track could not be saved. Please, try again.'));
			}
		}
		$categories = $this->CategoriesTrack->Category->find('list');
		$tracks = $this->CategoriesTrack->Track->find('list');
		$this->set(compact('categories', 'tracks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CategoriesTrack->exists($id)) {
			throw new NotFoundException(__('Invalid categories track'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CategoriesTrack->save($this->request->data)) {
				$this->Session->setFlash(__('The categories track has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The categories track could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CategoriesTrack.' . $this->CategoriesTrack->primaryKey => $id));
			$this->request->data = $this->CategoriesTrack->find('first', $options);
		}
		$categories = $this->CategoriesTrack->Category->find('list');
		$tracks = $this->CategoriesTrack->Track->find('list');
		$this->set(compact('categories', 'tracks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CategoriesTrack->id = $id;
		if (!$this->CategoriesTrack->exists()) {
			throw new NotFoundException(__('Invalid categories track'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CategoriesTrack->delete()) {
			$this->Session->setFlash(__('Categories track deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Categories track was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
