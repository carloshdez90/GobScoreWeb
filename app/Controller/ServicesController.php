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

		$resultado = array('result' => -1);
		if ($this->request->is('POST')) {
			$this->loadModel('Denuncia');
			$this->Denuncia->create();
			
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
			if (isset($this->request->data['show'])) {
				$mostrar = $this->request->data['show'];
			}
			$estado = 0;
			$created = date('Y-m-d H:i:s');
			$datos = array(
				'Denuncia' => array(
					'nombre'         => $this->request->data['name'],
					'email'          => $this->request->data['email'],
					'tipo_id'        => $this->request->data['delation_info'],
					'mostrar'        => $mostrar,
					'codigo'         => $codigo,
					'institucion_id' => $this->request->data['delation_institution'],
					'estado'         => $estado,
					'created'        => $created,
				),
				'Mensaje' => array(
					'contenido' => $this->request->data['message'],
					'tipo' => 'd',
					'created' => $created,
				),
			);

			$resultado = array('result' => 0);
			if ($this->Denuncia->save($datos)) {
				$resultado = array('result' => 1);
			}
		}
		
		return json_encode($resultado);
	}

	public function pruebas() {
		
	}
}