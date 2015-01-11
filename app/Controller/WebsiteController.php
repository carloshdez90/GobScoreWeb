<?php

class WebsiteController extends AppController {
	public $layout = 'default';
	/**
	 *
	 */
	public function inicio() {
		$this->loadModel('Mensaje');
		$options = array(
			'limit' => 9,
			'order' => array('Mensaje.created DESC'),
		);
		$mensajes = $this->Mensaje->find('all', $options);
		$this->set('mensajes', $mensajes);

		$this->loadModel('Institucion');
		$options = array(
			'limit' => 9,
		);
		$institucions = $this->Institucion->find('all', $options);
		$institucions[0]['calificacion'] = 9;
		$institucions[1]['calificacion'] = 8.7;
		$institucions[2]['calificacion'] = 8.5;
		$institucions[3]['calificacion'] = 8.3;
		$institucions[4]['calificacion'] = 8.2;
		$institucions[5]['calificacion'] = 8;
		$institucions[6]['calificacion'] = 7.8;
		$institucions[7]['calificacion'] = 7.6;
		$institucions[8]['calificacion'] = 7;
		
		$this->set('institucions', $institucions);
		//echo $mensajes;
	}

	/**
	 *
	 */
	public function rendicionCuentas() {
		$this->layout = 'rendicion';
		$user_id = rand(1,100);
		$user_id = 1;
		$this->Session->write('user_id', $user_id);

		$this->loadModel('Form');
		$fields = array('id', 'name');
		$conditions = array(
			'deleted' => false
		);
		$options = array(
			'fields' => $fields,
			'conditions' => $conditions
		);
		$forms = $this->Form->find('all', $conditions);

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

			$this->request->data['Denuncia']['codigo']      = $codigo;
			$this->request->data['Denuncia']['solucionada'] = 0;
			$this->request->data['Denuncia']['created']     = date('Y-m-d H:i:s');
			
			$this->request->data['Mensaje']['tipo']    = 'd';
			$this->request->data['Mensaje']['created'] = date('Y-m-d H:i:s');
			
			//unset($this->Empresa->User->validate['Denuncia_id']);
			if ($this->Denuncia->Mensaje->saveAssociated($this->request->data)) {
				return $this->redirect(array('action' => 'inicio'));
			}
			
		}
		
		$this->loadModel('Institucion');
		$institucions = $this->Institucion->find('list');
		$this->set(compact('institucions'));

		$tipos = array(
			'Empleado perdiendo el tiempo.',
			'Acoso sexual',
			'Acoso laboral',
			'Abando de trabajo',
			'Uso inadecuado de propiedad publica',
			'Soborno',
			'Negligencia',
		);
		$this->set(compact('tipos'));
		
	}

}
