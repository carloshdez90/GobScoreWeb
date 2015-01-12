<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $layout = 'administracion';

	
	/**
	 *
	 */
	public function index($modelo = 'User') {
		$modelo = $this->modelClass;
		$this->{$modelo}->recursive = 0;
		$conditions = array(
			$modelo.'.deleted' => false,
		);

		if ('Denuncia' == $modelo) {
			$conditions = array();
		}
		$this->Paginator->settings = array(
			$modelo => array(
				'limit' => $this->limit,
				'conditions' => $conditions,
			)
		);
		$this->set('registros', $this->Paginator->paginate());
		$this->set('total', $this->{$modelo}->find('count'));
		$total = ($this->{$modelo}->find('count') + $this->limit -1)/$this->limit;
		$this->set('total', floor($total));
		$this->set('pagina', 1);
		$this->set('limit', $this->limit);

		$this->set('modelo', $modelo);
		$this->set('controller', $this->params['controller']);
		$name = 'name';
		if ('Denuncia' === $modelo) {
			$name = 'codigo';
		}
		$this->set('name', $name);
		$this->set('band', true);
	}

	/**
	 *
	 */
	public $limit = 5;
	public function pagination() {
		$modelo = $this->modelClass;
		$pagina = $_GET['pagina'];
		$buscar = $_GET['buscar'];
		if (isset($_GET['limit'])) {
			// Si hemos seleccionado un limite este sera configurado
			$this->limit = $_GET['limit'];
		}
		$this->layout = 'ajax';
		$this->{$modelo}->recursive = 0;
		$conditions = array(
			$modelo.'.deleted' => false,
		);
		if ('Denuncia' == $modelo) {
			$conditions = array();
		}
		$name = 'name';
        if ('Denuncia' === $modelo) {
            $name = 'codigo';
        }
		if ('' != $buscar) {
			$conditions['OR'] = array(
				array($modelo.'.'.$name.' LIKE' => '%'.$buscar.'%'),
			);	
		}
		$this->Paginator->settings = array(
			$modelo => array(
				'page'       => $pagina,
				'limit'      => $this->limit,
				'conditions' => $conditions
			),
		);
		$this->set('registros', $this->Paginator->paginate());
		$options = array(
			'conditions' => $conditions
		);
		$total = ($this->{$modelo}->find('count', $options) + $this->limit - 1)/$this->limit;
		$this->set('total', floor($total));
		$this->set('pagina', $pagina);
		$this->set('limit', $this->limit);
		
		$this->set('modelo', $modelo);
		$this->set('controller', $this->params['controller']);
        $this->set('name', $name);

	}

	/**
	 * Mis modificaciones para autenticacion
	 */
	public $components = array(
	'Session',
	'Auth' => array(
	'loginRedirect' => array('controller' => 'empresas', 'action' => 'index'),
	'logoutRedirect' => array('controller' => 'users', 'action' => 'login')
	)
	);
	public function beforeFilter() {
	$this->Auth->allow('inicio','login', 'rendicionCuentas', 'getFormulario', 'getPregunta', 'calificarPregunta', 'seguimiento', 'tiempo');				
	}
	/**/

	/**
	 *
	 */
	public function indexAjax($modelo = 'User') {
		$this->layout = 'ajax';
		$modelo = $this->modelClass;
		$this->{$modelo}->recursive = 0;
		$conditions = array(
			$modelo.'.deleted' => false,
		);
		$this->Paginator->settings = array(
			$modelo => array(
				'limit' => $this->limit,
				'conditions' => $conditions,
			)
		);
		$this->set('registros', $this->Paginator->paginate());
		$this->set('total', $this->{$modelo}->find('count'));
		$total = ($this->{$modelo}->find('count') + $this->limit -1)/$this->limit;
		$this->set('total', floor($total));
		$this->set('pagina', 1);
		$this->set('limit', $this->limit);

		$this->set('modelo', $modelo);
		$this->set('controller', $this->params['controller']);
		$name = 'name';
		if ('Denuncia' === $modelo) {
			$name = 'codigo';
		}
		$this->set('name', $name);
	}

	/**
	 *
	 */
	public function paginationAjax() {
		$modelo = $this->modelClass;
		$pagina = $_GET['pagina'];
		$buscar = $_GET['buscar'];
		if (isset($_GET['limit'])) {
			// Si hemos seleccionado un limite este sera configurado
			$this->limit = $_GET['limit'];
		}
		$this->layout = 'ajax';
		$this->{$modelo}->recursive = 0;
		$conditions = array(
			$modelo.'.deleted' => false,
		);
		$name = 'name';
        if ('Denuncia' === $modelo) {
            $name = 'codigo';
        }
		if ('' != $buscar) {
			$conditions['OR'] = array(
				array($modelo.'.'.$name.' LIKE' => '%'.$buscar.'%'),
			);	
		}
		$this->Paginator->settings = array(
			$modelo => array(
				'page'       => $pagina,
				'limit'      => $this->limit,
				'conditions' => $conditions
			),
		);
		$this->set('registros', $this->Paginator->paginate());
		$options = array(
			'conditions' => $conditions
		);
		$total = ($this->{$modelo}->find('count', $options) + $this->limit - 1)/$this->limit;
		$this->set('total', floor($total));
		$this->set('pagina', $pagina);
		$this->set('limit', $this->limit);
		
		$this->set('modelo', $modelo);
		$this->set('controller', $this->params['controller']);
        $this->set('name', $name);

	}
	
	public function deleteAjax($id = null) {
		$this->autoRender = false;
		$this->request->onlyAllow('ajax');
		$this->response->type('json');

		$modelo = $this->modelClass;
		
		$mensaje = 'Operación no permitida!!!';
		if ($this->request->is('post')) {
			$this->{$modelo}->id = $id;
			$datos = array('deleted' => true);
			$mensaje = 'El registro no ha sido eliminado.';
			if ($this->{$modelo}->save($datos)) {
				$mensaje = 'El registro ha sido eliminado con éxito.';
			}
		}

		$data = array('mensaje' => $mensaje);
		return json_encode($data);
	}
}
