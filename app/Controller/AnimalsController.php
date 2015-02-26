<?php
App::uses('AppController', 'Controller');
/**
 * Animals Controller
 *
 * @property Animal $Animal
 * @property PaginatorComponent $Paginator
 */
class AnimalsController extends AppController {

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
	    $conditions = array();
        
        if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;

            foreach($this->data['Filter'] as $name => $value){
                if($value){
                   $filter_url[$name] = urlencode($value);
                }
            }   
            return $this->redirect($filter_url);
        }else {
            foreach($this->params['named'] as $param_name => $value){
                if(!in_array($param_name, array('page','sort','direction','limit'))){
                    $conditions['Animal.'.$param_name.' LIKE'] = '%'.$value.'%';
                }
            }
        }
	    
		$this->Animal->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('Animal.removed' => 'N');
		$this->set('animals', $this->Paginator->paginate($options));
		
		$clients = $this->Animal->Client->find('list',array('conditions' => array('Client.removed' => 'N','Client.active' =>'S')));
		$species = $this->Animal->Specie->find('list',array('conditions' => array('Specie.removed' => 'N','Specie.active' =>'S')));
		$breeds = $this->Animal->Breed->find('list',array('conditions' => array('Breed.removed' => 'N','Breed.active' =>'S')));
		$this->set(compact('clients', 'species', 'breeds'));
	}

//////////////////////////////novos animais

		public function new_animals() {
		    $animals = $this->Animal->query('SELECT COUNT(*)as quant FROM animals as Animal WHERE Animal.active ="S" AND Animal.removed = "N" AND  MONTH(NOW()) = MONTH(Animal.created)');
        if ($this->request->is('requested')) {
            return $animals;
        } else {
            $this->set('animals', $animals);
        }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Animal->exists($id)) {
			throw new NotFoundException(__('Invalid animal'));
		}
		$options = array('conditions' => array('Animal.' . $this->Animal->primaryKey => $id));
		$this->set('animal', $this->Animal->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Animal->create();
			if ($this->Animal->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The animal has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The animal could not be saved. Please, try again.').
                                        '</div>');
			}
		}
		$clients = $this->Animal->Client->find('list',array('conditions' => array('Client.removed' => 'N','Client.active' =>'S')));
		$species = $this->Animal->Specie->find('list',array('conditions' => array('Specie.removed' => 'N','Specie.active' =>'S')));
		$breeds = $this->Animal->Breed->find('list',array('conditions' => array('Breed.removed' => 'N','Breed.active' =>'S')));
		$this->set(compact('clients', 'species', 'breeds'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Animal->exists($id)) {
			throw new NotFoundException(__('Invalid animal'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Animal->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The animal has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The animal could not be saved. Please, try again.').
                                        '</div>');
			}
		} else {
			$options = array('conditions' => array('Animal.' . $this->Animal->primaryKey => $id));
			$this->request->data = $this->Animal->find('first', $options);
		}
		$clients = $this->Animal->Client->find('list',array('conditions' => array('Client.removed' => 'N','Client.active' =>'S')));
		$species = $this->Animal->Specie->find('list',array('conditions' => array('Specie.removed' => 'N','Specie.active' =>'S')));
		$breeds = $this->Animal->Breed->find('list',array('conditions' => array('Breed.removed' => 'N','Breed.active' =>'S')));
		$this->set(compact('clients', 'species', 'breeds'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Animal->id = $id;
		if (!$this->Animal->exists()) {
			throw new NotFoundException(__('Invalid animal'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Animal->save($data)) {
			$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The animal has been deleted.').
                                        '</div>');
		} else {
			$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The animal could not be deleted. Please, try again.').
                                        '</div>');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
