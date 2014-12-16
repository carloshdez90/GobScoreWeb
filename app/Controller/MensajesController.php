<?php
App::uses('AppController', 'Controller');
/**
 * Mensajes Controller
 *
 * @property Mensaje $Mensaje
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MensajesController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	/**
	 * index method
	 *
	 * @return void
	 *
	public function index() {
		$this->Mensaje->recursive = 0;
		$this->set('mensajes', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Mensaje->exists($id)) {
			throw new NotFoundException(__('Invalid mensaje'));
		}
		$options = array('conditions' => array('Mensaje.' . $this->Mensaje->primaryKey => $id));
		$this->set('mensaje', $this->Mensaje->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {

			$this->request->data['Mensaje']['tipo']    = 'r';
			$this->request->data['Mensaje']['created'] = date('Y-m-d H:i:s');
			
			$this->Mensaje->create();
			if ($this->Mensaje->save($this->request->data)) {

				
				$this->loadModel('Denuncia');
				$conditions = array(
					'Denuncia.id' => $this->request->data['Mensaje']['denuncia_id']
				);
				$options = array(
					'conditions' => $conditions,
				);
				$denuncia = $this->Denuncia->find('first', $options);
				
				$this->loadModel('Calificacion');
				$conditions = array(
					'Calificacion.denuncia_id' => $this->request->data['Mensaje']['denuncia_id']
				);
				$options = array(
					'conditions' => $conditions,
				);
				$calificacion = $this->Calificacion->find('first', $options);
				
				$fecha_i = $denuncia['Denuncia']['created'];
				$fecha_f = date('Y-m-d H:i:s');
        		$tiempo  = (strtotime($fecha_i) - strtotime($fecha_f));
				$tiempo  = abs($tiempo);
				
				$this->Calificacion->id = $calificacion['Calificacion']['id'];
				$datos = array(
					'respuesta'    => $tiempo,
				);
				$this->Calificacion->save($datos);
				
				
				$this->Session->setFlash(__('The mensaje has been saved.'));
				return $this->redirect(array('controller' => 'denuncias', 'action' => 'view', $this->request->data['Mensaje']['denuncia_id']));
			} else {
				$this->Session->setFlash(__('The mensaje could not be saved. Please, try again.'));
			}
		}
		$denuncias = $this->Mensaje->Denuncia->find('list');
		$this->set(compact('denuncias'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Mensaje->exists($id)) {
			throw new NotFoundException(__('Invalid mensaje'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mensaje->save($this->request->data)) {
				$this->Session->setFlash(__('The mensaje has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mensaje could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mensaje.' . $this->Mensaje->primaryKey => $id));
			$this->request->data = $this->Mensaje->find('first', $options);
		}
		$denuncias = $this->Mensaje->Denuncium->find('list');
		$this->set(compact('denuncias'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Mensaje->id = $id;
		if (!$this->Mensaje->exists()) {
			throw new NotFoundException(__('Invalid mensaje'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mensaje->delete()) {
			$this->Session->setFlash(__('The mensaje has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mensaje could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
