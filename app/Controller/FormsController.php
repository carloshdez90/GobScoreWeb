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
				return $this->redirect(array('action' => 'index'));
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
		$this->Form->id = $id;
		if (!$this->Form->exists()) {
			throw new NotFoundException(__('Invalid form'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Form->delete()) {
			$this->Session->setFlash(__('The form has been deleted.'));
		} else {
			$this->Session->setFlash(__('The form could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
