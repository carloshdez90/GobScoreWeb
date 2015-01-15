<?php
App::uses('AppController', 'Controller');
/**
 * Questions Controller
 *
 * @property Question $Question
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class QuestionsController extends AppController {

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
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
		$this->set('question', $this->Question->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Question->create();
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
			}
		}
		$forms = $this->Question->Form->find('list');
		$this->set(compact('forms'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Question->exists($id)) {
			throw new NotFoundException(__('Invalid question'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Question->save($this->request->data)) {
				$this->Session->setFlash(__('The question has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The question could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Question.' . $this->Question->primaryKey => $id));
			$this->request->data = $this->Question->find('first', $options);
		}
		$forms = $this->Question->Form->find('list');
		$this->set(compact('forms'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Question->id = $id;
		if (!$this->Question->exists()) {
			throw new NotFoundException(__('Invalid question'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Question->delete()) {
			$this->Session->setFlash(__('The question has been deleted.'));
		} else {
			$this->Session->setFlash(__('The question could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	/**
	 *
	 */
	public function ajaxIndex() {
		$this->layout = 'ajax';
		$this->Question->recursive = 0;
		$form_id = $_POST['form_id'];
		$conditions = array(
			'Question.form_id' => $form_id,
		);
		$this->Paginator->settings = array(
			'Question' => array(
				'limit' => $this->limit,
				'conditions' => $conditions,
			)
		);
		$this->set('registros', $this->Paginator->paginate());
		$this->set('total', $this->Question->find('count'));
		$total = ($this->Question->find('count') + $this->limit -1)/$this->limit;
		$this->set('total', floor($total));
		$this->set('pagina', 1);
		$this->set('limit', $this->limit);
	}

		/**
	 * add method
	 *
	 * @return void
	 */
	public function addAjax() {
		$this->autoRender = false;
		$this->request->onlyAllow('ajax');
		$this->response->type('json');

		$mensaje = 'Operación no permitida!!!';
		if ($this->request->is('post')) {
			$this->Question->create();

			$data = array(
				'name'    => $_POST['name'],
				'form_id' => $_POST['form_id'],
				'deleted' => false,
			);
			$mensaje = 'Los datos no han sido guardados.';
			if ($this->Question->save($data)) {
				$mensaje = 'Los datos han sido guardados.';
			}
		}
		$data = array('mensaje' => $mensaje);
		return json_encode($data);
	}
	
}
