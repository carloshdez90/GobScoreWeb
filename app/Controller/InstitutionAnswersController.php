<?php
App::uses('AppController', 'Controller');
/**
 * InstitutionAnswers Controller
 *
 * @property InstitutionAnswer $InstitutionAnswer
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class InstitutionAnswersController extends AppController {

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
		$this->InstitutionAnswer->recursive = 0;
		$this->set('institutionAnswers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->InstitutionAnswer->exists($id)) {
			throw new NotFoundException(__('Invalid institution answer'));
		}
		$options = array('conditions' => array('InstitutionAnswer.' . $this->InstitutionAnswer->primaryKey => $id));
		$this->set('institutionAnswer', $this->InstitutionAnswer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->InstitutionAnswer->create();
			if ($this->InstitutionAnswer->save($this->request->data)) {
				$this->Session->setFlash(__('The institution answer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institution answer could not be saved. Please, try again.'));
			}
		}
		$delations = $this->InstitutionAnswer->Delation->find('list');
		$delationsDelationInfos = $this->InstitutionAnswer->DelationsDelationInfo->find('list');
		$delationsDelationInfosDelationInstitutions = $this->InstitutionAnswer->DelationsDelationInfosDelationInstitution->find('list');
		$this->set(compact('delations', 'delationsDelationInfos', 'delationsDelationInfosDelationInstitutions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->InstitutionAnswer->exists($id)) {
			throw new NotFoundException(__('Invalid institution answer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->InstitutionAnswer->save($this->request->data)) {
				$this->Session->setFlash(__('The institution answer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The institution answer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('InstitutionAnswer.' . $this->InstitutionAnswer->primaryKey => $id));
			$this->request->data = $this->InstitutionAnswer->find('first', $options);
		}
		$delations = $this->InstitutionAnswer->Delation->find('list');
		$delationsDelationInfos = $this->InstitutionAnswer->DelationsDelationInfo->find('list');
		$delationsDelationInfosDelationInstitutions = $this->InstitutionAnswer->DelationsDelationInfosDelationInstitution->find('list');
		$this->set(compact('delations', 'delationsDelationInfos', 'delationsDelationInfosDelationInstitutions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->InstitutionAnswer->id = $id;
		if (!$this->InstitutionAnswer->exists()) {
			throw new NotFoundException(__('Invalid institution answer'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->InstitutionAnswer->delete()) {
			$this->Session->setFlash(__('The institution answer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The institution answer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
