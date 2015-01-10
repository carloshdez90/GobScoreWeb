<?php
App::uses('AppController', 'Controller');
/**
 * Delations Controller
 *
 * @property Delation $Delation
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DelationsController extends AppController {

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
		$this->Delation->recursive = 0;
		$this->set('delations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Delation->exists($id)) {
			throw new NotFoundException(__('Invalid delation'));
		}
		$options = array('conditions' => array('Delation.' . $this->Delation->primaryKey => $id));
		$this->set('delation', $this->Delation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Delation->create();
			if ($this->Delation->save($this->request->data)) {
				$this->Session->setFlash(__('The delation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delation could not be saved. Please, try again.'));
			}
		}
		$delationInfos = $this->Delation->DelationInfo->find('list');
		$delationInfosDelationInstitutions = $this->Delation->DelationInfosDelationInstitution->find('list');
		$this->set(compact('delationInfos', 'delationInfosDelationInstitutions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Delation->exists($id)) {
			throw new NotFoundException(__('Invalid delation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Delation->save($this->request->data)) {
				$this->Session->setFlash(__('The delation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The delation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Delation.' . $this->Delation->primaryKey => $id));
			$this->request->data = $this->Delation->find('first', $options);
		}
		$delationInfos = $this->Delation->DelationInfo->find('list');
		$delationInfosDelationInstitutions = $this->Delation->DelationInfosDelationInstitution->find('list');
		$this->set(compact('delationInfos', 'delationInfosDelationInstitutions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Delation->id = $id;
		if (!$this->Delation->exists()) {
			throw new NotFoundException(__('Invalid delation'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Delation->delete()) {
			$this->Session->setFlash(__('The delation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The delation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
