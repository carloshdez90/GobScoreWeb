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

				$denuncia_id = $this->request->data['Mensaje']['denuncia_id'];
				
				$this->loadModel('Denuncia');

				$options['conditions'] = array(
					'Denuncia.id' => $denuncia_id,
				);
				$denuncia = $this->Denuncia->find('first', $options);
				
				$this->loadModel('Calificacion');
				$options['conditions'] = array(
					'Calificacion.denuncia_id' => $this->request->data['Mensaje']['denuncia_id']
				);
				$calificacion = $this->Calificacion->find('first', $options);
				
				$fecha_i = $denuncia['Denuncia']['created'];
				$fecha_f = date('Y-m-d H:i:s');
        		$tiempo_final  = (strtotime($fecha_i) - strtotime($fecha_f));
				$tiempo_final  = abs($tiempo_final);
				
				$this->Calificacion->id = $calificacion['Calificacion']['id'];
				$datos = array(
					'respuesta'    => $tiempo_final,
				);
				$this->Calificacion->save($datos);

				// Tiempos para el ranking
				$institucion_id = $denuncia['Denuncia']['institucion_id'];

				$this->loadModel('Calificacion');
				$this->Calificacion->recursive = -1;
				$options['conditions'] = array(
					'Denuncia.institucion_id'   => $institucion_id,
					'Calificacion.respuesta !=' => -1,
				);
				$options['joins'] = array(
					array(
						'table' => 'denuncias',
						'alias' => 'Denuncia',
						'type' => 'LEFT',
						'conditions' => array(
							'Denuncia.id = Calificacion.denuncia_id',
						)
					)
				);
				$total = $this->Calificacion->find('count', $options);
				$this->Calificacion->recursive = 1;
				$options = array();
				
				$this->loadModel('Tiempo');
				$options['conditions'] = array(
					'Tiempo.institucion_id' => $institucion_id,
				);
				$tiempo = $this->Tiempo->find('first', $options);
				if (!$tiempo) {
					$this->Tiempo->create();
					$datos['created']        = date('Y-m-d H:i:s');
					$datos['institucion_id'] = $institucion_id;
					$datos['total']         = $tiempo_final;
				} else {
					$this->Tiempo->id = $tiempo['Tiempo']['id'];
					$datos['total']  = ($tiempo['Tiempo']['total']*$total + $tiempo_final)/($total + 1);
				}
				$this->Tiempo->save($datos);
				// Tiempos para el ranking
				
				$this->Session->setFlash(__('The mensaje has been saved.'));
				return $this->redirect(
					array(
						'controller' => 'denuncias',
						'action' => 'view',
						$this->request->data['Mensaje']['denuncia_id']
					)
				);
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
