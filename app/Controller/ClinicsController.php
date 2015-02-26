<?php
App::uses('AppController', 'Controller');
/**
 * Clinics Controller
 *
 * @property Clinic $Clinic
 * @property PaginatorComponent $Paginator
 */
class ClinicsController extends AppController {

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
                    $conditions['Clinic.'.$param_name.' LIKE'] = '%'.$value.'%';
                }
            }
        }
	    
		$this->Clinic->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('Clinic.removed' => 'N');
		$this->set('clinics', $this->Paginator->paginate($options));
		
			}
//////////////////////////////////////////////////QUANTIDADE DE CLINICAS REGISTRADAS/////////////////////////////////////////////
public function quant_clinics(){
	
	$clinics = $this->Clinic->find('count',array('conditions'=>array('Clinic.removed' => 'N','Clinic.active' => 'S')));
        if ($this->request->is('requested')) {
            return $clinics;
        } else {
            $this->set('clinics', $clinics);
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
		if (!$this->Clinic->exists($id)) {
			throw new NotFoundException(__('Invalid clinic'));
		}
		$options = array('conditions' => array('Clinic.' . $this->Clinic->primaryKey => $id));
		$this->set('clinic', $this->Clinic->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Clinic->create();
			if ($this->Clinic->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The clinic has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The clinic could not be saved. Please, try again.').
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
		if (!$this->Clinic->exists($id)) {
			throw new NotFoundException(__('Invalid clinic'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Clinic->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The clinic has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The clinic could not be saved. Please, try again.').
                                        '</div>');
			}
		} else {
			$options = array('conditions' => array('Clinic.' . $this->Clinic->primaryKey => $id));
			$this->request->data = $this->Clinic->find('first', $options);
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
		$this->Clinic->id = $id;
		if (!$this->Clinic->exists()) {
			throw new NotFoundException(__('Invalid clinic'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Clinic->save($data)) {
			$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The clinic has been deleted.').
                                        '</div>');
		} else {
			$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The clinic could not be deleted. Please, try again.').
                                        '</div>');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
