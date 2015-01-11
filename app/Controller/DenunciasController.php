<?php
App::uses('AppController', 'Controller');
/**
 * Denuncias Controller
 *
 * @property Denuncia $Denuncia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DenunciasController extends AppController {

	public $layout = 'administracion';

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
	 */
	//	public function index() {
	//		$this->Denuncia->recursive = 0;
	//		$this->set('denuncias', $this->Paginator->paginate());
	//	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Denuncia->exists($id)) {
			throw new NotFoundException(__('Invalid denuncia'));
		}
		$options = array('conditions' => array('Denuncia.' . $this->Denuncia->primaryKey => $id));
		$denuncia = $this->Denuncia->find('first', $options);
		$this->set('denuncia', $denuncia);
		
		$this->loadModel('Calificacion');
		$conditions = array(
			'Calificacion.denuncia_id' => $id
		);
		$options = array(
			'conditions' => $conditions,
		);
		$total = $this->Calificacion->find('count', $options);
		if (0 === $total) {
			$fecha_i = $denuncia['Denuncia']['created'];
            $fecha_f = date('Y-m-d H:i:s');
        	$tiempo  = (strtotime($fecha_i) - strtotime($fecha_f));
	        $tiempo  = abs($tiempo);
			
			$this->Calificacion->create();
			$datos = array(
				'visto'        => $tiempo,
				'respuesta'    => -1,
				'calificacion' => -1,
				'denuncia_id'  => $id,
				'created'      => $fecha_f,
			);
			$this->Calificacion->save($datos);
		}
		/*
		$fecha_i = date('Y-m-d H:i:s');
		$fecha_f = date('Y-m-13 00:00:00');
		$tiempo  = (strtotime($fecha_i)-strtotime($fecha_f));
		$tiempo  = abs($tiempo); 
		$dias = $tiempo%86400;
		$horas = floor($tiempo/3600);
		$tiempo = $tiempo%3600;
		$minutos = floor($tiempo/60);
		$segundos = $tiempo%60; 
		echo 'Dias: '.$dias.' Horas: '.$horas.' Minutos: '.$minutos.' Segundos: '.$segundos;
		 */
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Denuncia->create();
			if ($this->Denuncia->save($this->request->data)) {
				$this->Session->setFlash(__('The denuncia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The denuncia could not be saved. Please, try again.'));
			}
		}
		$institucions = $this->Denuncia->Institucion->find('list');
		$this->set(compact('institucions'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Denuncia->exists($id)) {
			throw new NotFoundException(__('Invalid denuncia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Denuncia->save($this->request->data)) {
				$this->Session->setFlash(__('The denuncia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The denuncia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Denuncia.' . $this->Denuncia->primaryKey => $id));
			$this->request->data = $this->Denuncia->find('first', $options);
		}
		$institucions = $this->Denuncia->Institucion->find('list');
		$this->set(compact('institucions'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Denuncia->id = $id;
		if (!$this->Denuncia->exists()) {
			throw new NotFoundException(__('Invalid denuncia'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Denuncia->delete()) {
			$this->Session->setFlash(__('The denuncia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The denuncia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
