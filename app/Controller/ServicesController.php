<?php

class ServicesController extends AppController {
	public $layout = 'ajax';
	
	/**
	 *
	 */
	public function instituciones() {
		$this->autoRender = false;
		//$this->request->onlyAllow('ajax');
		$this->response->type('json');

		$this->loadModel('Institucion');

		$instituciones = $this->Institucion->find('all');
		$i = 0;
		foreach ($instituciones as $institucion) {
			$datos[$i++] = array(
				'id' => $institucion['Institucion']['id'],
				'name' => $institucion['Institucion']['name'],
				'slug' => '',
				'created_at' => $institucion['Institucion']['created'],
				'updated_at' => $institucion['Institucion']['updated'],
			);
		}
		
		return json_encode($datos);
	}

		/**
	 *
	 */
	public function tipoDenuncias() {
		$this->autoRender = false;
		//$this->request->onlyAllow('ajax');
		$this->response->type('json');

		$datos = array(
			'delation_infos' => array(
				array('id' => 1, 'kind' => 'Empleado perdiendo el tiempo'),
				array('id' => 2, 'kind' => 'Acoso laboral'),
				array('id' => 3, 'kind' => 'Acoso sexual'),
				array('id' => 4, 'kind' => 'Abandono de trabajo'),
				array('id' => 5, 'kind' => 'Uso inadecuado de la propiedad pública'),
				array('id' => 6, 'kind' => 'Soborno'),
				array('id' => 7, 'kind' => 'Negligencia'),
			)
		);

		return json_encode($datos);
	}

		/**
		 *
		 */
	public $limite = 99999999;
	public function guardarDenuncia() {
		$this->autoRender = false;
		//$this->request->onlyAllow('ajax');
		$this->response->type('json');

		$resultado = array('response' => -1);
		if ($this->request->is('POST')) {
			
			$this->_decipher_data();
			
			$this->loadModel('Denuncia');

			$data = $this->request->input('json_decode');
			
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
			
			$mostrar = true;
			if (isset($data->{'show'})) {
				$mostrar = $data->{'show'};
			}
			$estado = 0;
			$created = date('Y-m-d H:i:s');
			$datos = array(
				'Denuncia' => array(
					'nombre'         => $data->{'name'},
					'email'          => $data->{'email'},
					'tipo_id'        => $data->{'delation_info'},
					'mostrar'        => $mostrar,
					'codigo'         => $codigo,
					'institucion_id' => $data->{'delation_institution'},
					'estado'         => $estado,
					'created'        => $created,
				),
				'Mensaje' => array(
					'contenido' => $data->{'message'},
					'tipo' => 'd',
					'created' => $created,
				),
			);
			$resultado = array('response' => 0);
			$salvar = $this->Denuncia->Mensaje->saveAssociated($datos)
			if ($salvar) {
				$resultado = array('response' => 1);
			}else{
			    debug($this->Denuncia->invalidFields());
			    return false;
			}
		}
		
                //return json_encode($salvar);
		return json_encode($resultado);
		//return json_encode($this->request->useful_data);
		//return json_encode($this->request->input('json_decode'));
		//$datos = $this->request->input('json_decode');
		//return $datos->{'message'};

		
	}

	public function pruebas() {

	}

	protected function _decipher_data() {
		$contentType = $this->request->header('Content-Type');
		$sendsJson = (strpos($contentType, 'json') !== false);
		$sendsUrlEncodedForm = (strpos($contentType, 'x-www-form-urlencoded') !== false);

		if ($sendsJson) {
			$this->request->useful_data = $this->request->input('json_decode', true);
		}
		if ($sendsUrlEncodedForm) {
			$this->request->useful_data = $this->request->data;
		}
		return $this->request->useful_data;
	}

	/**
	 * Estado de la denuncia
	 */
	public function seguimiento() {
		$this->autoRender = false;
		$this->response->type('json');

		$resultado = array('response' => -1);
		if ($this->request->is('POST')) {

			$this->_decipher_data();
			$data = $this->request->input('json_decode');

			//$email  = $data->{'mail'};
			//$codigo = $data->{'idtrack'};

			$codigo = '54794358';
			$email = 'esau@gmail.com';
			
			$this->loadModel('Denuncia');
			$options['fields'] = array('Denuncia.id', 'Denuncia.estado');
			$options['conditions'] = array(
				'email'  => $email,
				'codigo' => $codigo,
			);
			$denuncia = $this->Denuncia->find('first', $options);
			$resultado = array('response' => 0);
			if ($denuncia) {
				$indice = $denuncia['Denuncia']['estado'];
				$resultado = array(
					-1 => 1,
					0  => 2,
					1  => 3,
				);
				$resultado = array('response' => $resultado[$indice]);
			}
		}
		return json_encode($resultado);
	}
}
