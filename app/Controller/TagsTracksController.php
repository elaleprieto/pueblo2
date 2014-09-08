<?php
App::uses('AppController', 'Controller');
/**
 * TagsTracks Controller
 *
 * @property TagsTrack $TagsTrack
 * @property PaginatorComponent $Paginator
 */
class TagsTracksController extends AppController {

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
		$this->TagsTrack->recursive = 0;
		$this->set('tagsTracks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TagsTrack->exists($id)) {
			throw new NotFoundException(__('Invalid tags track'));
		}
		$options = array('conditions' => array('TagsTrack.' . $this->TagsTrack->primaryKey => $id));
		$this->set('tagsTrack', $this->TagsTrack->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TagsTrack->create();
			if ($this->TagsTrack->save($this->request->data)) {
				$this->Session->setFlash(__('The tags track has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tags track could not be saved. Please, try again.'));
			}
		}
		$tags = $this->TagsTrack->Tag->find('list');
		$tracks = $this->TagsTrack->Track->find('list');
		$this->set(compact('tags', 'tracks'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TagsTrack->exists($id)) {
			throw new NotFoundException(__('Invalid tags track'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->TagsTrack->save($this->request->data)) {
				$this->Session->setFlash(__('The tags track has been saved'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tags track could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TagsTrack.' . $this->TagsTrack->primaryKey => $id));
			$this->request->data = $this->TagsTrack->find('first', $options);
		}
		$tags = $this->TagsTrack->Tag->find('list');
		$tracks = $this->TagsTrack->Track->find('list');
		$this->set(compact('tags', 'tracks'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TagsTrack->id = $id;
		if (!$this->TagsTrack->exists()) {
			throw new NotFoundException(__('Invalid tags track'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TagsTrack->delete()) {
			$this->Session->setFlash(__('Tags track deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tags track was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}
}
