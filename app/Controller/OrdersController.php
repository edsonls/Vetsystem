<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	public $helpers = array('Js');

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
                    $conditions['Order.'.$param_name.' LIKE'] = '%'.$value.'%';
                }
            }
        }
	    
		$this->Order->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('Order.removed' => 'N');
		$this->set('orders', $this->Paginator->paginate($options));
		
		$animals = $this->Order->Animal->find('list',array('conditions' => array('Animal.removed' => 'N','Animal.active' =>'S')));
		$clinics = $this->Order->Clinic->find('list',array('conditions' => array('Clinic.removed' => 'N','Clinic.active' =>'S')));
		$veterinarians = $this->Order->Veterinarian->find('list',array('conditions' => array('Veterinarian.removed' => 'N','Veterinarian.active' =>'S')));
		$paymentMethods = $this->Order->PaymentMethod->find('list',array('conditions' => array('PaymentMethod.removed' => 'N','PaymentMethod.active' =>'S')));
		$examinations = $this->Order->Examination->find('list',array('conditions' => array('Examination.removed' => 'N','Examination.active' =>'S')));
		$this->set(compact('animals', 'clinics', 'veterinarians', 'paymentMethods', 'examinations'));
	}

/////////////////////////////////ajax que retorna o animal referente ao dono///////////////////////////////////
 public function ajax_animal(){
 			
		$id_dono = $this->request->data['Order']['client_id'];
		 
		$animals = $this->Order->Animal->find('list',array('conditions' => array('Animal.removed' => 'N','Animal.active' =>'S','Animal.client_id'=>$id_dono)));
		
		 
		$this->set('animals',$animals);
		$this->layout = 'ajax';
}
/////////////////////////////////////////função para gerar o recibo/////////////////////////////
public function recibo($id=null){
	if (!$this->Order->exists($id)) {
		throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id),
									'fields' => array('*'),
										'joins' => array(
										    array(
										      'alias' => 'Client',
										      'table' => 'clients',
										      'type' => 'LEFT',
										      'conditions' => '`Animal`.`client_id` = `Client`.`id`'
										    ),));
		$this->set('order', $this->Order->find('first', $options));
}
///////////////////////////////////QUANTIDADE DE EXAMES EM ANALISE////////////////////////////////////////////////////
public function quant_exames_analise(){
	
	$orders = $this->Order->find('count',array('conditions'=>array('Order.removed' => 'N','Order.active' => 'S','Order.status'=>'1')));
        if ($this->request->is('requested')) {
            return $orders;
        } else {
            $this->set('orders', $orders);
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
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
		$this->set('order', $this->Order->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The order has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'recibo',$this->Order->id));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The order could not be saved. Please, try again.').
                                        '</div>');
			}
		}
		$this->loadModel('Client');
		$clients = $this->Client->find('list',array('conditions' => array('Client.removed' => 'N','Client.active' =>'S')));
		$clinics = $this->Order->Clinic->find('list',array('conditions' => array('Clinic.removed' => 'N','Clinic.active' =>'S')));
		$veterinarians = $this->Order->Veterinarian->find('list',array('conditions' => array('Veterinarian.removed' => 'N','Veterinarian.active' =>'S')));
		$paymentMethods = $this->Order->PaymentMethod->find('list',array('conditions' => array('PaymentMethod.removed' => 'N','PaymentMethod.active' =>'S')));
		$examinations = $this->Order->Examination->find('list',array('conditions' => array('Examination.removed' => 'N','Examination.active' =>'S')));
		$this->set(compact( 'clinics', 'veterinarians', 'paymentMethods', 'examinations','clients'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The order has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The order could not be saved. Please, try again.').
                                        '</div>');
			}
		} else {
			$options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
			$this->request->data = $this->Order->find('first', $options);
		}
		$animals = $this->Order->Animal->find('list',array('conditions' => array('Animal.removed' => 'N','Animal.active' =>'S')));
		$clinics = $this->Order->Clinic->find('list',array('conditions' => array('Clinic.removed' => 'N','Clinic.active' =>'S')));
		$veterinarians = $this->Order->Veterinarian->find('list',array('conditions' => array('Veterinarian.removed' => 'N','Veterinarian.active' =>'S')));
		$paymentMethods = $this->Order->PaymentMethod->find('list',array('conditions' => array('PaymentMethod.removed' => 'N','PaymentMethod.active' =>'S')));
		$examinations = $this->Order->Examination->find('list',array('conditions' => array('Examination.removed' => 'N','Examination.active' =>'S')));
		$this->set(compact('animals', 'clinics', 'veterinarians', 'paymentMethods', 'examinations'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Order->save($data)) {
			$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The order has been deleted.').
                                        '</div>');
		} else {
			$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The order could not be deleted. Please, try again.').
                                        '</div>');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
