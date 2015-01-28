<?php
App::uses('AppController', 'Controller');
/**
 * Forms Controller
 *
 * @property Form $Form
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class FormsController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session');

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Form->exists($id)) {
			throw new NotFoundException(__('Invalid form'));
		}
		$options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
		$this->set('form', $this->Form->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {

			$this->request->data['Form']['status']         = true;
			$this->request->data['Form']['institucion_id'] = $this->Auth->user('institucion_id');
			
			$this->Form->create();
			if ($this->Form->save($this->request->data)) {
				$this->Session->setFlash(__('The form has been saved.'));
				
				return $this->redirect(array('action' => 'view', $this->Form->id));
			} else {
				$this->Session->setFlash(__('The form could not be saved. Please, try again.'));
			}
		}
		$institucions = $this->Form->Institucion->find('list');
		$this->set(compact('institucions'));
		$this->set('band', 0);
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Form->exists($id)) {
			throw new NotFoundException(__('Invalid form'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Form->save($this->request->data)) {
				$this->Session->setFlash(__('The form has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The form could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
			$this->request->data = $this->Form->find('first', $options);
		}
		$institucions = $this->Form->Institucion->find('list');
		$this->set(compact('institucions'));
		$this->set('band', 1);
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		
		$this->Form->id = $this->request->data['Form']['id'];
		if (!$this->Form->exists()	) {
		throw new NotFoundException(__('Invalid empresa'));
		}
		
		$this->request->allowMethod('post', 'delete');
		$datos = array('deleted' => true);
		$this->Session->setFlash(__('El formulario no ha sido eliminado.'));
		
		if ($this->Form->save($datos)) {
			$estado = array('deleted' => true);
			$conditions = array(
				'form_id' => $id,
			);
			$this->Form->Question->updateAll($estado, $conditions);
			$this->Session->setFlash(__('El formulario ha sido eliminado.'));
		}
		
		return $this->redirect(array('action' => 'index'));
	}

	public $layout = 'administracion';

	/**
	 *
	 */
	public function reporte($id = 1) {
		
		if (!$this->Form->exists($id)) {
			throw new NotFoundException(__('Invalid form'));
		}
		$options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
		$form = $this->Form->find('first', $options);
		$this->set('form', $form);

		$this->loadModel('Answer');
		$this->Auth->recursive = 0;
		$fields = array('Question.id', 'COUNT(Answer.answer) AS total');
		$conditions = array(
			'Forms.id' => 1,
			'Answer.answer' => 0,
		);
		$joins = array(
			array(
				'table' => 'forms',
				'alias' => 'Form',
				'type' => 'INNER',
				'conditions' => array(
					'Form.id = Question.form_id',
				)
			),
			array(
				'table' => 'questions',
				'alias' => 'Questions',
				'type' => 'INNER',
				'conditions' => array(
					'Questions.id = Answer.question_id',
				)
			),
			array(
				'table' => 'forms',
				'alias' => 'Forms',
				'type' => 'INNER',
				'conditions' => array(
					'Forms.id = Questions.form_id',
				)
			),
		);
		$group = array('Answer.question_id');
		$options = array(
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins,
			'group' => $group,
		);
		$tmp_no = $this->Answer->find('all', $options);
		
		$options['conditions']['Answer.answer'] = 1;
		$tmp_si = $this->Answer->find('all', $options);

		foreach ($tmp_no as $item) {
			$res_no[$item['Question']['id']] = $item[0]['total'];
		}
		foreach ($tmp_si as $item) {
			$res_si[$item['Question']['id']] = $item[0]['total'];
		}
		$total = count($form['Question']);
		for ($i = 0; $i < $total; $i++) {
			
			$form['Question'][$i]['no'] = 0;
			if (isset($res_no[$form['Question'][$i]['id']])) {
				$form['Question'][$i]['no'] = $res_no[$form['Question'][$i]['id']];
			}
			$form['Question'][$i]['si'] = 0;
			if (isset($res_si[$form['Question'][$i]['id']])) {
				$form['Question'][$i]['si'] = $res_si[$form['Question'][$i]['id']];
			}
			$total_tmp = $form['Question'][$i]['si'] + $form['Question'][$i]['no'];
			if (0 == $total_tmp) {
				$total_tmp = 1;
			}
			$form['Question'][$i]['si'] = $form['Question'][$i]['si']/$total_tmp*100;
			$form['Question'][$i]['no'] = $form['Question'][$i]['no']/$total_tmp*100;
		}
		$this->set('form', $form);



		// Reporte LaTeX
		include 'Component/latex-report/lib/LaTeX.php';
		include 'Component/latex-report/lib/Table.php';

		$latex = new LaTeX();

		$latex->setDocumentclass('letterpaper');
		$latex->usepackage('utf8', 'inputenc');
		$latex->usepackage('spanish,mexico', 'babel');
		$latex->usepackage('pdftex', 'graphicx');
		$latex->usepackage('left=2cm, right=2cm, top=3cm, bottom=5.5cm', 'geometry');
		$latex->usepackage('', 'supertabular');
		$latex->usepackage('', 'fancyhdr');

		$latex->usepackage('light,math', 'kurier');

		$dir = $this->getDirLaTeX('sistema');

		$encabezado = '\begin{Huge}\textbf{'.$form['Institucion']['name'].'}\end{Huge}'.
					  '\\\\ ~ \\\\ \begin{Large}\textbf{Reporte de Evaluación}\end{Large}';
		$latex->head('C', $encabezado);
		$latex->foot('C', '');
		
		/**
		 * Begin document
		 */
		$latex->write('\pagenumbering{gobble}');

		/**
		 * Begin table
		 */
		$tabla = new Table();

		$tabla->setColumn('p{1cm}');
		$tabla->setColumn('p{12.5cm}');
		$tabla->setColumn('p{1cm}');
		$tabla->setColumn('p{1cm}');
	
		
		$tabla->addTitle('Id');
		$tabla->addTitle('Pregunta');
		$tabla->addTitle('Si');
		$tabla->addTitle('No');

		
		foreach ($form['Question'] as $item) {
			$tabla->newRow();
			$tabla->addCol($item['id']);
			$tabla->addCol($item['name']);
			$tabla->addCol($item['si'].' \%');
			$tabla->addCol($item['no'].' \%');
			$tabla->addRow();
		}

		$latex->write('');
		$latex->write('Nombre del formulario: \textbf{'.$form['Form']['name'].'}');
		$latex->write($tabla->getTable());
		$latex->write('');
		$latex->write('');
		$latex->write('\begin{flushright}El Salvador \today \begin{flushright}');
		/**
		 * End table
		 */

		/**
		 * End document
		 */

		$archivo = $this->Auth->user('institucion_id');
		$documento = $latex->getLaTeX($dir, $archivo);

		$this->set('dir', $dir);
		$this->set('archivo', $archivo);

	}

	/**
	 *
	 */
	public function csv($id = 0) {
		$id = $_POST['id'];
		if (!$this->Form->exists($id)) {
			throw new NotFoundException(__('Invalid form'));
		}
		$options = array('conditions' => array('Form.' . $this->Form->primaryKey => $id));
		$form = $this->Form->find('first', $options);
		$this->set('form', $form);

		$this->loadModel('Answer');
		$this->Auth->recursive = 0;
		$fields = array('Question.id', 'COUNT(Answer.answer) AS total');
		$conditions = array(
			'Forms.id' => 1,
			'Answer.answer' => 0,
		);
		$joins = array(
			array(
				'table' => 'forms',
				'alias' => 'Form',
				'type' => 'INNER',
				'conditions' => array(
					'Form.id = Question.form_id',
				)
			),
			array(
				'table' => 'questions',
				'alias' => 'Questions',
				'type' => 'INNER',
				'conditions' => array(
					'Questions.id = Answer.question_id',
				)
			),
			array(
				'table' => 'forms',
				'alias' => 'Forms',
				'type' => 'INNER',
				'conditions' => array(
					'Forms.id = Questions.form_id',
				)
			),
		);
		$group = array('Answer.question_id');
		$options = array(
			'fields' => $fields,
			'conditions' => $conditions,
			'joins' => $joins,
			'group' => $group,
		);
		$tmp_no = $this->Answer->find('all', $options);
		
		$options['conditions']['Answer.answer'] = 1;
		$tmp_si = $this->Answer->find('all', $options);

		foreach ($tmp_no as $item) {
			$res_no[$item['Question']['id']] = $item[0]['total'];
		}
		foreach ($tmp_si as $item) {
			$res_si[$item['Question']['id']] = $item[0]['total'];
		}
		$total = count($form['Question']);
		for ($i = 0; $i < $total; $i++) {
			
			$form['Question'][$i]['no'] = 0;
			if (isset($res_no[$form['Question'][$i]['id']])) {
				$form['Question'][$i]['no'] = $res_no[$form['Question'][$i]['id']];
			}
			$form['Question'][$i]['si'] = 0;
			if (isset($res_si[$form['Question'][$i]['id']])) {
				$form['Question'][$i]['si'] = $res_si[$form['Question'][$i]['id']];
			}
			$total_tmp = $form['Question'][$i]['si'] + $form['Question'][$i]['no'];
			if (0 == $total_tmp) {
				$total_tmp = 1;
			}
			$form['Question'][$i]['si'] = $form['Question'][$i]['si']/$total_tmp*100;
			$form['Question'][$i]['no'] = $form['Question'][$i]['no']/$total_tmp*100;
		}
		$this->set('form', $form);
		
		if (isset($_POST['csv'])) {
			$data = array();
			$cont = 0;
			foreach ($form['Question'] as $item) {
				$data[$cont++] = array(
					$item['name'],
					$item['si'],
					$item['no']
				);
			}
			
			$_serialize = 'data';

			$this->viewClass = 'CsvView.Csv';
			$this->set(compact('data', '_serialize'));
			$this->set('descarga', false);
			return;
		}
	}

	public function download() {
		// Return response object to prevent controller from trying to render
		// a view
		$institucion_id = $this->Auth->user('institucion_id');
		$this->response->file(
			'pdfs/'.$institucion_id.'.pdf',
			array('download' => true, 'name' => 'reporte_institucion_'.$institucion_id)
			//'/pdfs/1.pdf',
			//array('download' => true, 'name' => 'prueba.pdf')
		);
		return $this->response;
	}
}
