<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Institucions Controller
 *
 * @property Institucion $Institucion
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InstitucionsController extends AppController {
	
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
		$this->Institucion->recursive = 0;
		$conditions = array(
			'active !=' => 'd',
		);
		$this->Paginator->settings = array(
			'Institucion' => array(
				'limit' => $this->limit,
				'conditions' => $conditions,
			)
		);
		$this->set('registros', $this->Paginator->paginate());
		$this->set('total', $this->Institucion->find('count'));
		$total = ($this->Institucion->find('count') + $this->limit -1)/$this->limit;
		$this->set('total', floor($total));
		$this->set('pagina', 1);
		$this->set('limit', $this->limit);
	}
	*/

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Institucion->exists($id)) {
			throw new NotFoundException(__('Invalid institucion'));
		}
		$options = array('conditions' => array('Institucion.' . $this->Institucion->primaryKey => $id));
		$this->set('institucion', $this->Institucion->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {

			// Password
			$password = $this->strongPassword($this->request->data['User'][0]['username']);
			$this->request->data['User'][0]['password'] = $password;
			$this->request->data['User'][0]['role']     = 'administrador';
			$this->request->data['User'][0]['password'] = $this->request->data['User'][0]['username'];
			
			unset($this->Institucion->User->validate['institucion_id']);
			if ($this->Institucion->saveAssociated($this->request->data)) {

				// Envio de clave al usuario
				$email = new CakeEmail('default');
				$email->template('administrador');
				$email->emailFormat('text');
				$email->from('mail@institucion.gob.sv');
				$email->to($this->request->data['User'][0]['username']);
				$email->subject('Cuenta gobscore');
				$email->viewVars(
					array(
						'name'        => $this->request->data['User'][0]['name'],
						'institucion' => $this->request->data['Institucion']['name'],
						'username'    => $this->request->data['User'][0]['username'],
						'password'    => $password
					)
				);
				$mensaje = 'Los datos de la institución y cuenta de '.
						   'administrador no han sido enviados.';
				if ($email->send()) {
					$mensaje = 'Los datos de la institución y cuenta de '.
							   'administrador han sido enviados correctamente';
				}
				
				$this->Session->setFlash($mensaje);
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institucion could not be saved. Please, try again.'));
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
		if (!$this->Institucion->exists($id)) {
			throw new NotFoundException(__('Invalid institucion'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Institucion->save($this->request->data)) {
				$this->Session->setFlash(__('The institucion has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institucion could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Institucion.' . $this->Institucion->primaryKey => $id));
			$this->request->data = $this->Institucion->find('first', $options);
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
		$this->Institucion->id = $id;
		if (!$this->Institucion->exists()) {
			throw new NotFoundException(__('Invalid institucion'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Institucion->delete()) {
			$this->Session->setFlash(__('The institucion has been deleted.'));
		} else {
			$this->Session->setFlash(__('The institucion could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 *
	 */
	public $layout = 'root';
}

