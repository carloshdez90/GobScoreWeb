<?php
App::uses('AppController', 'Controller');
/**
 * DelationInstitutions Controller
 *
 * @property DelationInstitution $DelationInstitution
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DelationInstitutionsController extends AppController {

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
//		$this->DelationInstitution->recursive = 0;
//		$this->set('delationInstitutions', $this->Paginator->paginate());
//	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DelationInstitution->exists($id)) {
			throw new NotFoundException(__('Invalid delation institution'));
		}
		$options = array('conditions' => array('DelationInstitution.' . $this->DelationInstitution->primaryKey => $id));
		$this->set('delationInstitution', $this->DelationInstitution->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DelationInstitution->create();
			if ($this->DelationInstitution->save($this->request->data)) {
				$this->Session->setFlash(__('The delation institution has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delation institution could not be saved. Please, try again.'));
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
		if (!$this->DelationInstitution->exists($id)) {
			throw new NotFoundException(__('Invalid delation institution'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DelationInstitution->save($this->request->data)) {
				$this->Session->setFlash(__('The delation institution has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delation institution could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DelationInstitution.' . $this->DelationInstitution->primaryKey => $id));
			$this->request->data = $this->DelationInstitution->find('first', $options);
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
		$this->DelationInstitution->id = $id;
		if (!$this->DelationInstitution->exists()) {
			throw new NotFoundException(__('Invalid delation institution'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DelationInstitution->delete()) {
			$this->Session->setFlash(__('The delation institution has been deleted.'));
		} else {
			$this->Session->setFlash(__('The delation institution could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
