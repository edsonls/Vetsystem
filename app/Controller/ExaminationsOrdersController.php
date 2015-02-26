<?php
App::uses('AppController', 'Controller');
/**
 * ExaminationsOrders Controller
 *
 * @property ExaminationsOrder $ExaminationsOrder
 * @property PaginatorComponent $Paginator
 */
class ExaminationsOrdersController extends AppController {

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
                    $conditions['ExaminationsOrder.'.$param_name.' LIKE'] = '%'.$value.'%';
                }
            }
        }
	    
		$this->ExaminationsOrder->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('ExaminationsOrder.removed' => 'N');
		$this->set('examinationsOrders', $this->Paginator->paginate($options));
		
				$orderServices = $this->ExaminationsOrder->OrderService->find('list',array('conditions' => array('OrderService.removed' => 'N','OrderService.active' =>'S')));
		$typeExaminations = $this->ExaminationsOrder->TypeExamination->find('list',array('conditions' => array('TypeExamination.removed' => 'N','TypeExamination.active' =>'S')));
		$this->set(compact('orderServices', 'typeExaminations'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ExaminationsOrder->exists($id)) {
			throw new NotFoundException(__('Invalid examinations order'));
		}
		$options = array('conditions' => array('ExaminationsOrder.' . $this->ExaminationsOrder->primaryKey => $id));
		$this->set('examinationsOrder', $this->ExaminationsOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ExaminationsOrder->create();
			if ($this->ExaminationsOrder->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The examinations order has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The examinations order could not be saved. Please, try again.').
                                        '</div>');
			}
		}
		$orderServices = $this->ExaminationsOrder->OrderService->find('list',array('conditions' => array('OrderService.removed' => 'N','OrderService.active' =>'S')));
		$typeExaminations = $this->ExaminationsOrder->TypeExamination->find('list',array('conditions' => array('TypeExamination.removed' => 'N','TypeExamination.active' =>'S')));
		$this->set(compact('orderServices', 'typeExaminations'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ExaminationsOrder->exists($id)) {
			throw new NotFoundException(__('Invalid examinations order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ExaminationsOrder->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The examinations order has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The examinations order could not be saved. Please, try again.').
                                        '</div>');
			}
		} else {
			$options = array('conditions' => array('ExaminationsOrder.' . $this->ExaminationsOrder->primaryKey => $id));
			$this->request->data = $this->ExaminationsOrder->find('first', $options);
		}
		$orderServices = $this->ExaminationsOrder->OrderService->find('list',array('conditions' => array('OrderService.removed' => 'N','OrderService.active' =>'S')));
		$typeExaminations = $this->ExaminationsOrder->TypeExamination->find('list',array('conditions' => array('TypeExamination.removed' => 'N','TypeExamination.active' =>'S')));
		$this->set(compact('orderServices', 'typeExaminations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ExaminationsOrder->id = $id;
		if (!$this->ExaminationsOrder->exists()) {
			throw new NotFoundException(__('Invalid examinations order'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->ExaminationsOrder->save($data)) {
			$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The examinations order has been deleted.').
                                        '</div>');
		} else {
			$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The examinations order could not be deleted. Please, try again.').
                                        '</div>');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
