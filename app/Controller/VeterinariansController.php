<?php
App::uses('AppController', 'Controller');
/**
 * Veterinarians Controller
 *
 * @property Veterinarian $Veterinarian
 * @property PaginatorComponent $Paginator
 */
class VeterinariansController extends AppController {

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
                    $conditions['Veterinarian.'.$param_name.' LIKE'] = '%'.$value.'%';
                }
            }
        }
	    
		$this->Veterinarian->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('Veterinarian.removed' => 'N');
		$this->set('veterinarians', $this->Paginator->paginate($options));
		
			}
///////////////////////////////////QUANTIDADE DE VETERINARIOS REGISTRADOS////////////////////////////////////////////////////
public function quant_veterinarians(){
	
	$veterinarians = $this->Veterinarian->find('count',array('conditions'=>array('Veterinarian.removed' => 'N','Veterinarian.active' => 'S')));
        if ($this->request->is('requested')) {
            return $veterinarians;
        } else {
            $this->set('veterinarians', $veterinarians);
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
		if (!$this->Veterinarian->exists($id)) {
			throw new NotFoundException(__('Invalid veterinarian'));
		}
		$options = array('conditions' => array('Veterinarian.' . $this->Veterinarian->primaryKey => $id));
		$this->set('veterinarian', $this->Veterinarian->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Veterinarian->create();
			if ($this->Veterinarian->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The veterinarian has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The veterinarian could not be saved. Please, try again.').
                                        '</div>');
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
		if (!$this->Veterinarian->exists($id)) {
			throw new NotFoundException(__('Invalid veterinarian'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Veterinarian->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The veterinarian has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The veterinarian could not be saved. Please, try again.').
                                        '</div>');
			}
		} else {
			$options = array('conditions' => array('Veterinarian.' . $this->Veterinarian->primaryKey => $id));
			$this->request->data = $this->Veterinarian->find('first', $options);
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
		$this->Veterinarian->id = $id;
		if (!$this->Veterinarian->exists()) {
			throw new NotFoundException(__('Invalid veterinarian'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Veterinarian->save($data)) {
			$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The veterinarian has been deleted.').
                                        '</div>');
		} else {
			$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The veterinarian could not be deleted. Please, try again.').
                                        '</div>');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
