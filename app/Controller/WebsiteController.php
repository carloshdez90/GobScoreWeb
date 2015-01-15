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
		$total = count($mensajes) - 1;
		if (-1 == $total) {
			$total = 0;
		}
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

	/**
	 *
	 */
	public function seguimiento($email = 'esau@gmail.com', $codigo = '43370665') {
		$this->layout = 'seguimiento';
		$this->loadModel('Denuncia');
		$options['fields'] = array('Denuncia.id');
		$options['conditions'] = array(
			'email' => $email,
			'codigo' => $codigo,
		);
		$denuncia = $this->Denuncia->find('first', $options);
		$indice = 1;
		if (count($denuncia)) {
			if (-1 != $denuncia['Calificacion'][0]['visto']) {
				$indice += 1;
			}
			if (-1 != $denuncia['Calificacion'][0]['respuesta']) {
				$indice += 1;
			}
		}
		$class = array(
			1 => 'state-send',
			2 => 'state-read',
			3 => 'state-ok',
		);
		$this->set('clase', $class[$indice]);
		$this->set('indice', $indice);
	}

	/**
	 *
	 */
	public function tiempo() {

		/*
		$denuncia_id = 1;
		$tiempo_final = rand(0,1000);
		
		$this->loadModel('Denuncia');
		$options['conditions'] = array(
			'Denuncia.id' => $denuncia_id,
		);
		$denuncia = $this->Denuncia->find('first', $options);


		
		$institucion_id = $denuncia['Denuncia']['institucion_id'];
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
			$datos['total']  = ($tiempo['Tiempo']['total'] + $tiempo_final)/2;
		}
		$this->Tiempo->save($datos);
		 
		$institucion_id = 1;
		
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

		*/
	}
}
