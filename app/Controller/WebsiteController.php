<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class WebsiteController extends AppController {
	public $layout = 'default';
	/**
	 *
	 */
	public function inicio() {
		$this->loadModel('Mensaje');
		$conditions = array(
			'Denuncia.mostrar' => true,
			'Mensaje.tipo' => 'd',
		);
		$options = array(
			'conditions' => $conditions,
			'limit' => 9,
			'order' => array('Mensaje.created DESC'),
		);
		$mensajes = $this->Mensaje->find('all', $options);
		$total = count($mensajes);

		for ($i = $total; $i < 10; $i++) {
			$mensajes[$i]['Denuncia']['nombre']   = '';
			$mensajes[$i]['Mensaje']['contenido'] = '';
		}
		$this->set('mensajes', $mensajes);
		
		
		// Obtenemos los mejores promedios
		$this->loadModel('Tiempo');
		$fields = array(
			'total',
			'Institucion.name'
		);
		$limit = 10;
		$order = array('total ASC');
		$options = array(
			'fields' => $fields,
			'limit'  => $limit,
			'order'  => $order, 
		);
		$tiempos = $this->Tiempo->find('all', $options);

		for ($i = 0; $i < 10; $i++) {
			$institucions[$i]['calificacion'] = '--';
			$institucions[$i]['Institucion']['name'] = '--';
		}
		
		$fields = array(
			'total',
		);
		$limit = 1;
		$order = array('total DESC');
		$options = array(
			'fields' => $fields,
			'limit'  => $limit,
			'order'  => $order, 
		);
		$tiempo_max = $this->Tiempo->find('first', $options);
		
		$order = array('total ASC');
		$options = array(
			'fields' => $fields,
			'limit'  => $limit,
			'order'  => $order, 
		);
		$tiempo_min = $this->Tiempo->find('first', $options);

		$i = 0;
		if ($tiempo_min) {
			$tiempo_max = $tiempo_max['Tiempo']['total'];
			$tiempo_min = $tiempo_min['Tiempo']['total'];
		}
		foreach ($tiempos as $registro) {
			$institucions[$i]['calificacion'] = 10 - ($registro['Tiempo']['total'] -
													  $tiempo_min)/$tiempo_max*10;
			$institucions[$i]['calificacion'] = floor($institucions[$i]['calificacion']*100)/100;
			$institucions[$i++]['Institucion']['name'] = $registro['Institucion']['name'];
		}
		
		$this->set('institucions', $institucions);
		//echo $mensajes;

	}

	/**
	 *
	 */
	public function rendicionCuentas() {
		$this->layout = 'rendicion';
		$user_id = rand(1,100);
		$user_id = 2;
		$this->Session->write('user_id', $user_id);

		$this->loadModel('Form');
		$fields = array('id', 'name');
		$conditions = array(
			'Form.deleted' => false,
			'implementation' => date('Y-m-d'),
		);
		$options = array(
			'fields' => $fields,
			'conditions' => $conditions
		);
		$forms = $this->Form->find('all', $options);

		$this->set('forms', $forms);
		
		}

	/**
	 *
	 */
	public function getFormulario($form_id = 1) {
		$this->layout = 'ajax';
		$this->set('form_id', $form_id);
	}

	/**
	 *
	 */
	public function getPregunta($form_id = 1) {
		$this->layout = 'ajax';

		$form_id = $_POST['form_id'];
		$user_id = $this->Session->read('user_id');

		// Cargamos el modelo de las preguntas;
		$this->loadModel('Question');
		$this->Question->recursive = -1;
		// Los campos que vamos a necesitar de ese modelo
		$fields = array('Question.id', 'Question.name');
		// Condiciones para obtener la consulta
		$conditions = array(
			'Question.form_id' => $form_id,
			'Question.deleted' => false,
		);
		// Opciones de la consulta
		$options = array(
			'fields'     => $fields,
			'conditions' => $conditions
		);
		// Obtenemos las preguntas del formulario
		$questions_temp = $this->Question->find('all', $options);

		$i = 0;
		$question_id = array();
		foreach ($questions_temp as $registro) {
			$question_id[$i++] = $registro['Question']['id'];
		}

		// Cargamos el modelo de las respuestas
		$this->loadModel('Answer');
		// Campos que necesitaremos
		$fields = array('Answer.question_id');
		// Condiciones
		$conditions = array(
			'Answer.user_id'     => $user_id,
		);
		// Ordenado por la ultima pregunta
		$order = array('Answer.question_id DESC');
		$pregunta_id = null;
		$cont = 0;
		foreach ($question_id as $id) {
			$conditions['Answer.question_id'] = $id;
			// Opciones de busqueda
			$options = array(
				'fields'     => $fields,
				'conditions' => $conditions,
				'order'       => $order,
			);
			// Obtenemos el ultimo registro
			$last_answer = $this->Answer->find('first', $options);
			if (!isset($last_answer['Answer'])) {
				$pregunta_id = $id;
				break;
			}
			$cont++;
		}
		$question = null;
		if ($pregunta_id) {
			$question = $questions_temp[$cont];
		}

		// Enviamos la pregunta a la vista
		$this->set('question', $question);

		// Eliminamos el user_id de las pruebas
		if (!$question) {
			//$user_id = rand(1,100);
			//$this->Session->write('user_id', $user_id);
		}
		
	}

	/**
	 *
	 */
	public function calificarPregunta($question_id = 1, $nota = 0) {
		$this->autoRender = false;
		$this->request->onlyAllow('ajax');
		$this->response->type('json');

		$user_id = $this->Session->read('user_id');
		// Cargamos el modelo de respuestas
		$this->loadModel('Answer');
		$this->Answer->create();
		$datos = array(
			'answer'      => $nota,
			'question_id' => $question_id,
			'created'     => date('Y-m-d H:i:s'),
			'user_id'     => $user_id,
		);
		$this->Answer->save($datos);
		
		return json_encode(array('data' => 1));
	}

	/**
	*
	 */
	public $limite = 99999999;
	public function denuncias() {
		$this->layout = 'ajax';
		if ($this->request->is('post')) {
			$this->loadModel('Denuncia');

			$total = 1;
			while ($total) {
				$codigo = rand(0, $this->limite);
				$conditions = array(
					'codigo' => $codigo
				);
				$options = array(
					'conditions' => $conditions,
				);
				$total = $this->Denuncia->find('count', $options);
			}

			$this->request->data['Denuncia']['codigo']  = $codigo;
			$this->request->data['Denuncia']['estado']  = -1;
			$this->request->data['Denuncia']['created'] = date('Y-m-d H:i:s');
			
			$this->request->data['Mensaje']['tipo']    = 'd';
			$this->request->data['Mensaje']['created'] = date('Y-m-d H:i:s');
			
			//unset($this->Empresa->User->validate['Denuncia_id']);
			if ($this->Denuncia->Mensaje->saveAssociated($this->request->data)) {

					// Envio de clave al usuario
				$email = new CakeEmail('default');
				$email->template('denuncia');
				$email->emailFormat('text');
				$email->from('cuenta@institucion.gob.sv');
				$email->to($this->request->data['Denuncia']['email']);
				$email->subject('Denuncia enviada con éxito.');
				$email->viewVars(
					array(
						'nombre' => $this->request->data['Denuncia']['nombre'],
						'codigo' => $codigo,
					)
				);
				
				$mensaje = 0;
				if ($email->send()) {
					$mensaje = 1;
				}
				
				$this->Session->setFlash($mensaje);
				return $this->redirect(array('action' => 'inicio'));
			}
			
		}

		$tipos = $this->listaTipoDenuncias();
		$this->set(compact('tipos'));
		
	}

	/**
	 *
	 */
	public function seguimiento($email = '', $codigo = '') {
		
		if ($this->request->is('POST')) {
			$email = $this->request->data['email'];
			$codigo = $this->request->data['codigo'];
			
			$this->layout = 'seguimiento';
			$this->loadModel('Denuncia');
			$options['fields'] = array('Denuncia.id', 'Denuncia.estado');
			$options['conditions'] = array(
				'email' => $email,
				'codigo' => $codigo,
			);
			$denuncia = $this->Denuncia->find('first', $options);
			$indice = $denuncia['Denuncia']['estado'];
			$class = array(
				-1 => 'state-send',
				0  => 'state-read',
				1  => 'state-ok',
			);
			$this->set('clase', $class[$indice]);
			$this->set('indice', $indice);
			$this->set('denuncia_id', $denuncia['Denuncia']['id']);
		} else {
			return $this->redirect(array('action' => 'inicio'));
		}
		
	}


	/**
	 *
	 */
	public function verificacion() {
		$this->autoRender = false;
		$this->request->onlyAllow('ajax');
		$this->response->type('json');

		if ($this->request->is('post')) {
			
			$email = $_POST['email'];
			$codigo = $_POST['codigo'];
			$this->loadModel('Denuncia');
			$options['conditions'] = array(
				'email'  => $email,
				'codigo' => $codigo,
			);
			$total = $this->Denuncia->find('count', $options);
			$data = array('error' => 1);
			if ($total) {
				$data = array('email' => $email, 'codigo' => $codigo);
			}
			return json_encode($data);
			
		}
		return;
	}
	
	/**
	 *
	 */
	public function tiempo() {

	}

	/**
	 * Calificar
	 */
	public function calificar() {
		$this->autoRender = false;
		$this->request->onlyAllow('ajax');
		$this->response->type('json');

		$data = array('message' => -1);
		if ($this->request->is('post')) {
			$denuncia_id  = $_POST['denuncia_id'];
			$calificacion = $_POST['calificacion'];
			$this->loadModel('Calificacion');
			$fields = array('Calificacion.id', 'Calificacion.calificacion');
			$conditions = array('Calificacion.denuncia_id' => $denuncia_id);
			$options = array(
				'fields' => $fields,
				'conditions' => $conditions,
			);
			$tmp = $this->Calificacion->find('first', $options);
			$this->Calificacion->id = $tmp['Calificacion']['id'];
			$data = array('message' => 0);
			if (-1 != $tmp['Calificacion']['calificacion']) {
				if ($this->Calificacion->save(array('calificacion' => $calificacion))) {
					$data = array('message' => 1);
				}	
			}
		}
		return json_encode($data);
	}

}
