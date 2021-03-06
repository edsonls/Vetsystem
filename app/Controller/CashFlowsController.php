<?php
App::uses('AppController', 'Controller');
/**
 * CashFlows Controller
 *
 * @property CashFlow $CashFlow
 * @property PaginatorComponent $Paginator
 */
class CashFlowsController extends AppController {

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
                    $conditions['CashFlow.'.$param_name.' LIKE'] = '%'.$value.'%';
                }
            }
        }
	    
		$this->CashFlow->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('CashFlow.removed' => 'N');
		$this->set('cashFlows', $this->Paginator->paginate($options));
		
				$orders = $this->CashFlow->Order->find('list',array('conditions' => array('Order.removed' => 'N','Order.active' =>'S')));
		$this->set(compact('orders'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CashFlow->exists($id)) {
			throw new NotFoundException(__('Invalid cash flow'));
		}
		$options = array('conditions' => array('CashFlow.' . $this->CashFlow->primaryKey => $id));
		$this->set('cashFlow', $this->CashFlow->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CashFlow->create();
			if ($this->CashFlow->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The cash flow has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The cash flow could not be saved. Please, try again.').
                                        '</div>');
			}
		}
		$orders = $this->CashFlow->Order->find('list',array('conditions' => array('Order.removed' => 'N','Order.active' =>'S')));
		$this->set(compact('orders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CashFlow->exists($id)) {
			throw new NotFoundException(__('Invalid cash flow'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CashFlow->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The cash flow has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The cash flow could not be saved. Please, try again.').
                                        '</div>');
			}
		} else {
			$options = array('conditions' => array('CashFlow.' . $this->CashFlow->primaryKey => $id));
			$this->request->data = $this->CashFlow->find('first', $options);
		}
		$orders = $this->CashFlow->Order->find('list',array('conditions' => array('Order.removed' => 'N','Order.active' =>'S')));
		$this->set(compact('orders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CashFlow->id = $id;
		if (!$this->CashFlow->exists()) {
			throw new NotFoundException(__('Invalid cash flow'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->CashFlow->save($data)) {
			$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The cash flow has been deleted.').
                                        '</div>');
		} else {
			$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The cash flow could not be deleted. Please, try again.').
                                        '</div>');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
