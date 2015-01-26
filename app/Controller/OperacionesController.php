<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class OperacionesController extends AppController {
	/**
	 *
	 */
	public function recuperarPassword() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			$username = $this->request->data['User']['username'];
			$mensaje = $this->__resetPassword($username);
			return $this->redirect(array('controller' => 'users', 'action' => 'login'));
		}
	}

	protected function __resetPassword($username = '') {
		$this->loadModel('User');
		$conditions = array(
			'username' => $username,
		);
		$options = array(
			'conditions' => $conditions
		);
		$user = $this->User->find('first', $options);
		$message = 'El usuario no existe.';
		if ($user) {
				$data['password'] = $this->strongPassword($username);
			$this->User->id = $user['User']['id'];
			$mensaje = 'No ha sido posible cambiar el password, intente de nuevo.';
			if ($this->User->save($data)) {
				
				$email = new CakeEmail('default');
				$email->template('change_password');
				$email->emailFormat('text');
				$email->from('mail@institucion.gob.sv');
				$email->to($username);
				$email->subject('Reinicio de credenciales gobscore.');
				$email->viewVars(
					array(
						'username' => $username,
						'password' => $data['password']
					)
				);
				
				$message = 'El password ha sido cambiado con éxito. Ha ocurrido un '.
						   'error en el envío de su nuevo password.';
				if ($email->send()) {
					$message = 'Los datos de la institución y cuenta de '.
							   'administrador han sido enviados correctamente';
				}
			}
		}
		return $message;
	}
}