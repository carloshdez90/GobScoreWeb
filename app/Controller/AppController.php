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
	
	public $layout = 'root';

	/**
	 *
	 */
	public function getConfigurations($modelo, $role, $params) {
		$ids = array();
		$estado = -1;
		if (isset($params['estado'])) {
			$estado = $params['estado'];
		}
		$condicion = ' !=';
		if (isset($params['contestados'])) {
			$contestados = $params['contestados'];
			if (1 == $contestados) {
				$condicion = '';	
			}
		}
		$fecha = date('Y-m-24');
		$regla = $modelo.'-'.$role;
		if ('Form-administrador' === $regla) {
			$this->loadModel('Form');
			$this->Form->recursive = 0;
			$fields = array('Form.id');
			$conditions = array(
				$modelo.'.deleted' => false,
				$modelo.'.institucion_id' => $this->Auth->user('institucion_id'),
				$modelo.'.implementation <' => $fecha,
			);
			$joins = array(
				array(
					'table' => 'questions',
					'alias' => 'Question',
					'type' => 'INNER',
					'conditions' => array(
						'Form.id = Question.form_id',
					)
				),
				array(
					'table' => 'answers',
					'alias' => 'Answer',
					'type' => 'INNER',
					'conditions' => array(
						'Question.id = Answer.question_id',
					)
				),
			);
			$group = array('Form.id');
			$options = array(
				'fields' => $fields,
				'conditions' => $conditions,
				'joins' => $joins,
				'group' => $group,
			);
			$formularios = $this->Form->find('all', $options);
			$i = 0;
			$ids = array();
			foreach ($formularios as $formulario) {
				$ids[$i++] = $formulario['Form']['id'];
			}
		}
		
		$configurations = array(
			'Institucion-root' => array(
				'conditions' => array(
					$modelo.'.deleted' => false,
				),
				'acciones' => 'acciones',
				'adicional' => null,
			),
			'User-root' => array(
				'conditions' => array(
					$modelo.'.deleted' => false,
					$modelo.'.role !=' => 'root',
				),
				'acciones' => 'acciones',
				'adicional' => array('titulo' => 'Institución',
									 'indice' => 'name',
									 'padre' => 'Institucion'),
			),
			'Tipo-root' => array(
				'conditions' => array(
					$modelo.'.deleted' => false,
				),
				'acciones' => 'acciones',
				'adicional' => null,
			),
			'Form-administrador' => array(
				'conditions' => array(
					$modelo.'.deleted' => false,
					$modelo.'.institucion_id' => $this->Auth->user('institucion_id'),
					$modelo.'.id'.$condicion => $ids,
				),
				'acciones' => 'acciones',
				'adicional' => array('titulo' => 'Fecha de realización', 'indice' => 'implementation'),
			),
			'Denuncia-administrador' => array(
				'conditions' => array(
					$modelo.'.estado' => $estado,
					$modelo.'.institucion_id' => $this->Auth->user('institucion_id'),
				),
				'acciones' => 'una',
				'adicional' => array('titulo' => 'Fecha', 'indice' => 'created'),
			),
		);
		$resultado = array(
			'conditions' => array(),
			'acciones' => 'acciones',
			'adicional' => null,
		);
		if (isset($configurations[$modelo.'-'.$role])) {
			$resultado = $configurations[$modelo.'-'.$role];
		}
		return $resultado;
	}

	/**
	 *
	 */
	public function verReporte($registros) {
		$fields = array('Answer.id');
		$joins = array(
			array(
				'table' => 'questions',
				'alias' => 'Question',
				'type' => 'INNER',
				'conditions' => array(
					'Form.id = Question.form_id',
				)
			),
			array(
				'table' => 'answers',
				'alias' => 'Answer',
				'type' => 'INNER',
				'conditions' => array(
					'Question.id = Answer.question_id',
				)
			),

		);
		
		$options = array(
			'fields' => $fields,
			'joins' => $joins,
		);
		$i = 0;
		foreach ($registros as $registro) {
			$options['conditions']['Form.id'] = $registro['Form']['id'];
			$tmp = $this->Form->find('count', $options);
			$registros[$i++]['lleno'] = $tmp;
		}

		return $registros;
	}

		/**
	 *
	 */
	public function eliminarForm($id) {
		$this->loadModel('Form');
		$fields = array('Answer.id');
		$joins = array(
			array(
				'table' => 'questions',
				'alias' => 'Question',
				'type' => 'INNER',
				'conditions' => array(
					'Form.id = Question.form_id',
				)
			),
			array(
				'table' => 'answers',
				'alias' => 'Answer',
				'type' => 'INNER',
				'conditions' => array(
					'Question.id = Answer.question_id',
				)
			),

		);
		
		$options = array(
			'fields' => $fields,
			'joins' => $joins,
		);

		$options['conditions']['Form.id'] = $id;
		$tmp = $this->Form->find('count', $options);

		return $tmp;
	}
	
	/**
	 *
	 */
	public function index($modelo = 'User') {
		$modelo = $this->modelClass;
		$this->{$modelo}->recursive = 0;
		$configurations = $this->getConfigurations(
			$modelo,
			$this->Auth->user('role'),
			array('estado' => -1)
		);
		$conditions = $configurations['conditions'];
		$this->Paginator->settings = array(
			$modelo => array(
				'limit' => $this->limit,
				'conditions' => $conditions,
			)
		);
		$registros = $this->Paginator->paginate();
		if ('Form' == $modelo) {
			$registros = $this->verReporte($registros);
		}
		$this->set('registros',$registros);

		
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

		$this->set('acciones', $configurations['acciones']);
		$this->set('adicional', $configurations['adicional']);

		
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
		$params = array();
		if (isset($_GET['adicional'])) {
			$params = array(
				$_GET['adicional']['index'] => $_GET['adicional']['value']
			);
		}
		//array('estado' => $_GET['estado'])
		$this->layout = 'ajax';
		$this->{$modelo}->recursive = 0;
		$configurations = $this->getConfigurations(
			$modelo,
			$this->Auth->user('role'),
			$params);
		$conditions = $configurations['conditions'];
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
		$registros = $this->Paginator->paginate();
		if ('Form' == $modelo) {
			$registros = $this->verReporte($registros);
		}
		$this->set('registros',$registros);
		
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
		
		$this->set('acciones', $configurations['acciones']);
		$this->set('adicional', $configurations['adicional']);
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
		$this->Auth->allow('inicio','login', 'rendicionCuentas',
						   'getFormulario', 'getPregunta', 'calificarPregunta',
						   'seguimiento', 'tiempo', 'denuncias', 'verificacion',
						   'instituciones', 'tipoDenuncias', 'guardarDenuncia', 'pruebas');				
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
		$foreign = null;
		if (isset($_POST['foreign'])) {
			$foreign = $_POST['foreign'];
			$conditions[$modelo.'.'.$foreign] = $_POST[$foreign];
		}
		$this->Paginator->settings = array(
			$modelo => array(
				'limit' => $this->limit,
				'conditions' => $conditions,
			)
		);
		$registros = $this->Paginator->paginate();

		$eliminar = true;
		if ($foreign) {
			$eliminar = !$this->eliminarForm($_POST[$foreign]);
		}
		$this->set('eliminar', $eliminar);

		$this->set('registros', $registros);
		//$this->set('total', $this->{$modelo}->find('count', $conditions));
		$options = array(
			'conditions' => $conditions
		);
		$total = ($this->{$modelo}->find('count', $options) + $this->limit - 1)/$this->limit;
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
		$foreign = null;
		if (isset($_GET['foreign'])) {
			$foreign = $_GET['foreign'];
			$conditions[$modelo.'.'.$foreign] = $_GET[$foreign];
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
		
		$registros = $this->Paginator->paginate();
		$this->set('registros', $registros);
		
		$eliminar = true;
		if ($foreign) {
			$eliminar = !$this->eliminarForm($_GET[$foreign]);
		}
		$this->set('eliminar', $eliminar);

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

	/**
	 * Agregar elementos aleatorios al password
	 */
	public function strongPassword($password = null) {
		return 'adminpass';
		if (null == $password) {
			return null;
		}
		$limit  = (date('h')*60*60 + (date('i')*60) + date('s'));
		$password = $limit.$password.rand(0, $limit);
		return $password;
	}

	public function delete($id = null) {
		$modelo = $this->modelClass;

		$id = $this->request->data[$modelo]['id'];
		$mensaje = 'Operación no permitida!!!';
		if ($this->request->is('post')) {
			$this->{$modelo}->id = $id;
			$datos = array('deleted' => true);
			$mensaje = 'El registro no ha sido eliminado.';
			if ($this->{$modelo}->save($datos)) {
				$mensaje = 'El registro ha sido eliminado con éxito.';
			}
		}
		$this->Session->setFlash($mensaje);

		return $this->redirect(array('action' => 'index'));
	}

	/**
	 * Constructor
	 */
	public function __construct($collections = array(), $settings = array()) {
		parent::__construct($collections, $settings);
		// Cargamos los componentes de autenticación
		$this->Auth = $this->Components->load('Auth', array('className' => 'Auth'));
		// Verificamos si el usuario es un administrador
		$this->set('tipo_usuario', $this->Auth->user('role'));
		
	}

	/**
	* Funcion para obtener la direccion donde se crearan los archivos tex para los reportes
	*/
	public $dir = array(
		'local'   => '/home/mathdebian/Documentos/www/gobscore',
		'sistema' => '/var/www/gobscore'
	);
	
	public function getDirLaTeX($tipo = 'local') {
		return $this->dir[$tipo];
	}

	/**
	 *
	 */
	public function listaTipoDenuncias($opcion = 'list') {
		$this->loadModel('Institucion');
		$institucions = $this->Institucion->find('list');
		$this->set(compact('institucions'));
		$this->loadModel('Tipo');
		$conditions = array('Tipo.deleted' => false);
		$options = array('conditions' => $conditions);
		$tipos = $this->Tipo->find($opcion, $options);
		return $tipos;
	}
}
