<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

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
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}
	/**/

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$institucions = $this->User->Institucion->find('list');
		if ($this->request->is('post')) {

			// Password
			$password = $this->strongPassword($this->request->data['User']['username']);
			$this->request->data['User']['password'] = $password;
			$this->request->data['User']['role']     = 'administrador';
			$this->request->data['User']['active']   = true;

			$this->User->create();
			if ($this->User->save($this->request->data)) {

					// Envio de clave al usuario
				$email = new CakeEmail('default');
				$email->template('administrador');
				$email->emailFormat('text');
				$email->from('mail@institucion.gob.sv');
				$email->to($this->request->data['User']['username']);
				$email->subject('Cuenta gobscore.');
				$email->viewVars(
					array(
						'name'        => $this->request->data['User']['name'],
						'institucion' => $institucions[$this->request->data['User']['institucion_id']],
						'username'    => $this->request->data['User']['username'],
						'password'    => $password
					)
				);
				
				if ($email->send()) {
					$mensaje = 'Los datos de la institución y cuenta de '.
							   'administrador han sido enviados correctamente';
				}
				
				$this->Session->setFlash($mensaje);

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
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
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$institucions = $this->User->Institucion->find('list');
		$this->set(compact('institucions'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 *
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 *
	 */
	public $layout = 'root';

	/**
	 *
	 */
	public function login() {
		$this->layout = 'login';
		if ($this->request->is('POST')) {
			if ($this->Auth->login()) {
				$redireccionar = array(
					'root'          => array('controller' => 'institucions', 'action' => 'index'),
					'administrador' => array('controller' => 'denuncias', 'action' => 'index'),
				);
				$role = $this->Auth->user('role');
				$this->redirect($redireccionar[$role]);
			}
		}
	}

		/**
	 * Logout
	 */
	public function logout(){
		$this->redirect($this->Auth->logout());
	}
}
