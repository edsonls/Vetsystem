<?php
App::uses('AppController', 'Controller');
/**
 * Clients Controller
 *
 * @property Client $Client
 * @property PaginatorComponent $Paginator
 */
class ClientsController extends AppController {

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
                    $conditions['Client.'.$param_name.' LIKE'] = '%'.$value.'%';
                }
            }
        }
	    
		$this->Client->recursive = 0;
		$this->paginate = array(
            'limit' => 10,
            'conditions' => $conditions
        );
		$options = array('Client.removed' => 'N');
		$this->set('clients', $this->Paginator->paginate($options));
		
			}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__('Invalid client'));
		}
		$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
		$this->set('client', $this->Client->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Client->create();
			$this->Client->saveAll($this->request->data);
			$this->loadModel('Order');
			$this->Order->create();
			$this->request->data['Order']['animal_id']=$this->Client->Animal->id;
			//debug($this->request->data)or die;
			if($this->Order->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The client has been saved.').
                                        '</div>');
				return $this->redirect(array('controller'=>'Orders','action' => 'recibo',$this->Order->id));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The client could not be saved. Please, try again.').
                                        '</div>');
			}
		}
		$this->loadModel('Specie');
		$this->loadModel('Breed');
		$this->loadModel('Order');
		$species = $this->Specie->find('list',array('conditions' => array('Specie.removed' => 'N','Specie.active' =>'S')));
		//$order = $this->Order->find('list',array('conditions' => array('Order.removed' => 'N','Order.active' =>'S')));
		$breeds = $this->Breed->find('list',array('conditions' => array('Breed.removed' => 'N','Breed.active' =>'S')));
		$clinics = $this->Order->Clinic->find('list',array('conditions' => array('Clinic.removed' => 'N','Clinic.active' =>'S')));
		$veterinarians = $this->Order->Veterinarian->find('list',array('conditions' => array('Veterinarian.removed' => 'N','Veterinarian.active' =>'S')));
		$paymentMethods = $this->Order->PaymentMethod->find('list',array('conditions' => array('PaymentMethod.removed' => 'N','PaymentMethod.active' =>'S')));
		$examinations = $this->Order->Examination->find('list',array('conditions' => array('Examination.removed' => 'N','Examination.active' =>'S')));
		$this->set(compact('species', 'breeds','examinations','clinics', 'veterinarians', 'paymentMethods'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Client->exists($id)) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Client->save($this->request->data)) {
				$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The client has been saved.').
                                        '</div>');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The client could not be saved. Please, try again.').
                                        '</div>');
			}
		} else {
			$options = array('conditions' => array('Client.' . $this->Client->primaryKey => $id));
			$this->request->data = $this->Client->find('first', $options);
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
		$this->Client->id = $id;
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		$data = array('id' => $id, 'removed' => 'S');
		$this->request->allowMethod('post', 'delete');
		if ($this->Client->save($data)) {
			$this->Session->setFlash('<br><div class="alert alert-success alert-dismissable">
                                        <i class="fa fa-check"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The client has been deleted.').
                                        '</div>');
		} else {
			$this->Session->setFlash('<br><div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b>'
                                        .__('The client could not be deleted. Please, try again.').
                                        '</div>');
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}
