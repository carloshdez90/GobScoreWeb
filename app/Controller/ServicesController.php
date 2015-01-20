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

	//public function pruebas() {}
}