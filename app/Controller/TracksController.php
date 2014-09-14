<?php
App::uses('AppController', 'Controller');
/**
 * Tracks Controller
 *
 * @property Track $Track
 * @property PaginatorComponent $Paginator
 */
class TracksController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('add', 'delete', 'edit', 'get', 'iframe', 'index', 'search', 'view', 'getReel', 'create');
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Kaltura');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Track->recursive = 0;
		$this->set('tracks', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Track->exists($id)) {
			throw new NotFoundException(__('Invalid track'));
		}
		$options = array('conditions' => array('Track.' . $this->Track->primaryKey => $id));
		$track = $this->Track->find('first', $options);

		if($entryId = $track['Track']['entryId']):
			$kClient = $this->Kaltura->getKalturaClient();
			$type = $this->Kaltura->getType($entryId);
			$kUrlEmbed = $this->Kaltura->getUrlEmbed($entryId, null, null, $type);
			$thumbs = $this->Kaltura->getThumbs($entryId);
		else:
			$kClient = null;
			$kUrlEmbed = null;
		endif;
		
		$this->set(compact('track', 'kClient', 'kUrlEmbed', 'thumbs', 'type'));
		$this->render('ver');
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$track = $this->request->data;
			$track['Track']['titulo'] = $track['Track']['title'];
			$this->Track->create();
			if ($this->Track->save($track)) {
				$this->Session->setFlash(__('The track has been saved'));
				// return $this->redirect(array('action' => 'add'));
			} else {
				$this->Session->setFlash(__('The track could not be saved. Please, try again.'));
			}
		}
		
		$categories = $this->Track->Category->find('list');
		$tags = $this->Track->Tag->find('list');
		
		$kClient = $this->Kaltura->getKalturaClient();
		
		###########
		# Videos
		###########
		# Filtro
		$filter = new KalturaMediaEntryFilter();
		$filter->mediaTypeEqual = 1; //only sync videos
		# Paginacion
		$pager = new KalturaFilterPager();
		$pager->pageSize = 1000;
		$pager->pageIndex = 1;
		# Listar
		$kalturaList = $kClient->media->listAction($filter, $pager); # videos en el servidor de Kaltura
		
		###########
		# Imagenes
		###########
		# Filtro
		$filter = new KalturaMediaEntryFilter();
		$filter->mediaTypeEqual = 2; //only sync imagenes
		# Paginacion
		$pager = new KalturaFilterPager();
		$pager->pageSize = 1000;
		$pager->pageIndex = 1;
		# Listar
		$kalturaImagenList = $kClient->media->listAction($filter, $pager); # videos en el servidor de Kaltura

		
		$this->Track->recursive = -1;
		$addedList = $this->Track->find('all', array('fields'=>'entryId')); # videos ya linkeados
		
		$this->set(compact('addedList', 'categories', 'kalturaList', 'kalturaImagenList', 'tags'));
	}

/**
 * add method
 *
 * @return void
 */
	public function create() {
		if ($this->request->is('post')):
			$this->autoRender = false;
			$track = $this->request->data;
			// debug($track, $showHtml = null, $showFrom = true);
			// return ;
			$track['Track']['user_id'] = $this->Auth->user('id');
			$fecha = DateTime::createFromFormat('j-m-Y', $track['Track']['visit']);
			$track['Track']['visit'] = $fecha->format('Y-m-d');
			$this->Track->create();
			if ($this->Track->save($track, true, array('title', 'description', 'localidad', 'visit', 'category', 'entryId', 'user_id'))):
				$trackId = $this->Track->id;

				# Si se subió una imagen, se la acondiciona para guardarla con el nombre del id del track creado.
				if(isset($this->data['Track']['image']['name']) && $this->data['Track']['image']['name'] != ''):
					$filename = explode(".", $this->data['Track']['image']['name']);
					$filenameext = $filename[count($filename)-1];
					$image = IMAGES.'tracks/images/'.$trackId.'.'.$filenameext;
					$this->Track->saveField('image', $trackId.'.'.$filenameext);
					if (!move_uploaded_file($this->data['Track']['image']['tmp_name'], $image)):
						$this->Session->setFlash("Ocurrió un problema subiendo el archivo.", 'fallo');
						throw new Exception("Error Processing Request", 1);
					endif;
				endif;
				$this->redirect(array('action'=>'index'));
			else:
				throw new Exception("Error Processing Request", 1);
			endif;
		endif;
		
		$categories = $this->Track->Category->find('list');
		$tags = $this->Track->Tag->find('list');

		$this->set('flashVars', $this->Kaltura->getUploadFlashVars());
		$this->set(compact('categories', 'tags'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Track->exists($id))
			throw new NotFoundException(__('Invalid track'));
		if ($this->request->is('post') || $this->request->is('put')):
			$track = $this->request->data;
			$track['Track']['titulo'] = $track['Track']['title'];
			// if ($this->Track->save($track)):
			debug($track, $showHtml = null, $showFrom = true);
			if ($this->Track->save($track, true, array('title', 'description', 'localidad', 'visit', 'category', 'entryId', 'user_id'))):
				# Si se subió una imagen, se la acondiciona para guardarla con el nombre del id del track creado.
				if(isset($this->data['Track']['image']['name']) && $this->data['Track']['image']['name'] != ''):
					$filename = explode(".", $this->data['Track']['image']['name']);
					$filenameext = $filename[count($filename)-1];
					$image = IMAGES.'tracks/images/'.$id.'.'.$filenameext;
					$this->Track->saveField('image', $id.'.'.$filenameext);
					if (!move_uploaded_file($this->data['Track']['image']['tmp_name'], $image)):
						$this->Session->setFlash("Ocurrió un problema subiendo el archivo.", 'fallo');
						throw new Exception("Error Processing Request", 1);
					endif;
				endif;
				return $this->redirect(Router::url('/listado'));
			else:
				$this->Session->setFlash(__('The track could not be saved. Please, try again.'));
			endif;
		else:
			$options = array('conditions' => array('Track.' . $this->Track->primaryKey => $id));
			$this->request->data = $this->Track->find('first', $options);
		endif;

		$categories = $this->Track->Category->find('list');
		$tags = $this->Track->Tag->find('list');

		$this->set('flashVars', $this->Kaltura->getUploadFlashVars());
		$this->set(compact('categories', 'tags'));
		$this->render('editar');
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Track->id = $id;
		if (!$this->Track->exists()) {
			throw new NotFoundException(__('Invalid track'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Track->delete()) {
			$this->Session->setFlash(__('Track deleted'));
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Track was not deleted'));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * get method: usado por Inicio para desplegar videos
 *
 * @param string $cantidad, $categoria
 * @param array excluded: ids de los excluidos
 * @return void
 */
	public function get($cantidad = null, $categoria = null, $excluded = null) {
		if (!$cantidad || !$categoria) {
			throw new NotFoundException(__('Invalid track'));
		}
		$categoria_id = $this->Track->Category->field('id', array('name' => $categoria));
		
		if (!$categoria_id) {
			throw new NotFoundException(__('Invalid track'));
		}
		
		$options['joins'] = array(
			array('table' => 'categories_tracks',
				'alias' => 'CategoriesTrack',
				'type' => 'inner',
				'conditions' => array(
					'Track.id = CategoriesTrack.track_id'
				)
			),
			array('table' => 'categories',
				'alias' => 'Category',
				'type' => 'inner',
				'conditions' => array(
					'CategoriesTrack.category_id = Category.id'
				)
			)
		);
		
		$options['conditions'] = array('Category.id' => $categoria_id
			, 'Track.destacado' => true
		);
		
		# Se excluyen algunos videos para no repetirlos en el listado
		if($excluded):
			$excluded = explode('-', $excluded);
			foreach($excluded as $key => $val)
				if(empty($val))
					unset($excluded[$key]);
			$options['conditions'] = array_merge($options['conditions']
				, array('NOT' => array('Track.id' => $excluded))
			);
		endif;
		
		$options['limit'] = $cantidad;
		$options['order'] = 'RAND()';
		
		return $this->Track->find('all', $options);
	}

/**
 * iframe method: usado por Inicio para desplegar videos
 *
 * @param string $cantidad, $categoria
 * @param array excluded: ids de los excluidos
 * @return void
 */
	public function iframe($cantidad = null, $category = null) {
		if (!$cantidad) {
			throw new NotFoundException(__('Invalid track'));
		}
		
		$options['conditions'] = array('Track.destacado' => true);

		if($category)
			$options['conditions'] = array_merge($options['conditions'], array('Track.category' => $category));
		
		$options['limit'] = $cantidad;
		$options['order'] = 'RAND()';
		
		return $this->Track->find('all', $options);
	}

	
	
/**
 * search method: accedido desde la navbar
 *
 * @param string $cantidad, $categoria
 * @return void
 */
	public function search($query = null) {
		// debug($this->request->query['v']);
		$query = isset($this->request->query['q']) ? $this->request->query['q'] : false;
		$visit = isset($this->request->query['v']) ? $this->request->query['v'] : false;
		if($query || $visit) {
			$this->request->data['query'] = $query ? $query : $visit;
			$query = strtolower($query);
			$query = explode(' ', $query); 
			
			$orConditions = array();
			$andConditions = array();
			
			# Se agregan estas restricciones porque quieren buscar solo en el titulo y en etiquetas
			// array_push($orConditions, array('lower(Tag.title) LIKE' => "%$query%"));
			// array_push($orConditions, array('lower(Track.title) LIKE' => "%$query%"));

			
			foreach ($query as $queryString):
				# Por título se busca siempre
				array_push($orConditions, array('lower(Track.title) LIKE' => "%$queryString%"));

				# Si está seleccionado el checkbox Descripción => d=1
				if(isset($this->request->query['d']) && $this->request->query['d'] == 1)
					array_push($orConditions, array('lower(Track.description) LIKE' => "%$queryString%"));
				
				# Si está seleccionado el checkbox Localidad => l=1
				if(isset($this->request->query['l']) && $this->request->query['l'] == 1)
					array_push($orConditions, array('lower(Track.localidad) LIKE' => "%$queryString%"));
			endforeach;
			
			if($visit):
				$visitAux = DateTime::createFromFormat('j-m-Y', $visit);
				array_push($andConditions, array('Track.visit =' => $visitAux->format('Y-m-d')));
			endif;

			$options['conditions'] = array('AND' => $andConditions, array('OR' => $orConditions));
			$options['group'] = array('Track.id');
			$options['recursive'] = -1;

			$this->set('tracks', $this->Track->find('all', $options));
		}
	}

	public function getReel() {
		// $entryId = '0_8b7yv0du'; # Reel 1
		$entryId = '0_r5ion5nd'; # Reel 2
		return $kUrlEmbed = $this->Kaltura->getUrlEmbed($entryId, null, '11170252');
	}
	
}
