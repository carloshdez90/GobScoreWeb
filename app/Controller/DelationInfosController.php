<?php
App::uses('AppController', 'Controller');
/**
 * DelationInfos Controller
 *
 * @property DelationInfo $DelationInfo
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DelationInfosController extends AppController {

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
	public function index() {
		$this->DelationInfo->recursive = 0;
		$this->set('delationInfos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->DelationInfo->exists($id)) {
			throw new NotFoundException(__('Invalid delation info'));
		}
		$options = array('conditions' => array('DelationInfo.' . $this->DelationInfo->primaryKey => $id));
		$this->set('delationInfo', $this->DelationInfo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->DelationInfo->create();
			if ($this->DelationInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The delation info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delation info could not be saved. Please, try again.'));
			}
		}
		$delationInstitutions = $this->DelationInfo->DelationInstitution->find('list');
		$this->set(compact('delationInstitutions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->DelationInfo->exists($id)) {
			throw new NotFoundException(__('Invalid delation info'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->DelationInfo->save($this->request->data)) {
				$this->Session->setFlash(__('The delation info has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delation info could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('DelationInfo.' . $this->DelationInfo->primaryKey => $id));
			$this->request->data = $this->DelationInfo->find('first', $options);
		}
		$delationInstitutions = $this->DelationInfo->DelationInstitution->find('list');
		$this->set(compact('delationInstitutions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->DelationInfo->id = $id;
		if (!$this->DelationInfo->exists()) {
			throw new NotFoundException(__('Invalid delation info'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->DelationInfo->delete()) {
			$this->Session->setFlash(__('The delation info has been deleted.'));
		} else {
			$this->Session->setFlash(__('The delation info could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
