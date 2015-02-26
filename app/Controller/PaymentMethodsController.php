<?php
App::uses('AppController', 'Controller');
/**
 * PaymentMethods Controller
 *
 * @property PaymentMethod $PaymentMethod
 * @property PaginatorComponent $Paginator
 */
class PaymentMethodsController extends AppController {

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
                    $conditions['PaymentMethod.'.$param_name.' LIKE'] = '%'.$value.'%';
                }
            }
        }
	    
		$this->PaymentMethod->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('PaymentMethod.removed' => 'N');
		$this->set('paymentMethods', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PaymentMethod->exists($id)) {
			throw new NotFoundException(__('Invalid payment method'));
		}
		$options = array('conditions' => array('PaymentMethod.' . $this->PaymentMethod->primaryKey => $id));
		$this->set('paymentMethod', $this->PaymentMethod->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PaymentMethod->create();
			if ($this->PaymentMethod->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The payment method has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The payment method could not be saved. Please, try again.').
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
		if (!$this->PaymentMethod->exists($id)) {
			throw new NotFoundException(__('Invalid payment method'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PaymentMethod->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The payment method has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The payment method could not be saved. Please, try again.').
                                        '</div>');
			}
		} else {
			$options = array('conditions' => array('PaymentMethod.' . $this->PaymentMethod->primaryKey => $id));
			$this->request->data = $this->PaymentMethod->find('first', $options);
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
		$this->PaymentMethod->id = $id;
		if (!$this->PaymentMethod->exists()) {
			throw new NotFoundException(__('Invalid payment method'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->PaymentMethod->save($data)) {
			$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The payment method has been deleted.').
                                        '</div>');
		} else {
			$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The payment method could not be deleted. Please, try again.').
                                        '</div>');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
