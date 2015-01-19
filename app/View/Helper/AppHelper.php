<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class AppHelper extends Helper {
	/**
	 * Ver los datos
	 */
	public function viewAnterior($datos = array()) {
		foreach ($datos as $registro) {
			echo '<div class="row-fluid">';
			echo '<div class="span4 bold">';
			echo $registro['label'];
			echo '</div>';
			echo '<div class="span8">';
			echo $registro['value'];
			echo '</div>';
			echo '</div>';
		}
	}

	/**
	 * Ver los datos
	 */
	public function view($datos = array()) {
		echo '<table class="table table-condensed table-striped table-hover table-bordered">';
		echo '<tbody>';
		foreach ($datos as $registro) {
			echo '<tr>';
			echo '<td class="span4 bold">';
			echo $registro['label'];
			echo '</td>';
			echo '<td class="span8">';
			echo $registro['value'];
			echo '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
	}
	/**
	 * Formulario horizontal
	 */
	public function form_horizontal($datos = array(), $submit = null) {
		$cadena = '';
		foreach ($datos as $registro) {
			echo '<div class="form-group">';
			echo '<label class="col-sm-2 control-label">';
			echo $registro['label'];
			echo '</label>';
			echo '<div class="col-sm-10">';
			echo $registro['value'];
			//echo '<input type="text" class="form-control input-sm">';
			echo '</div>';
			echo '</div>';
		}
		if (null != $submit) {
			echo '<div class="form-group">';
			echo '<div class="col-sm-offset-2 col-sm-10">';
			echo $submit;
			echo '</div>';
			echo '</div>';
		}
	}

	/**
	 * Estado empresa
	 */
	public function estadoEmpresa($estado = 'i', $id = 'false') {
		echo '<center>';
		if ('a' == $estado) {
			$nuevo_estado = 'i';
		} else {
			$nuevo_estado = 'a';
		}
		echo $nuevo_estado;
		echo '<button class="btn btn-mini btn-link" onClick="cambiarEstado('.$id.')" id="estado'.$id.'" value="'.$nuevo_estado.'">';
		$tipo = 'glyphicon-remove';
		if ($estado) {
			$tipo = 'glyphicon-ok';
		}
		echo '<span class="glyphicon '.$tipo.'" id="icon'.$id.'"></span>';
		echo '</button>';
		echo '</center>';
	}

	/**
	 * Estado usuario
	 */
	public function estado($estado = 'i', $id = 'false', $controller = null) {
		if (null == $controller) {
			return 'Error';
		}
		$cadena = '<center>';
		if ('a' == $estado) {
			$nuevo_estado = 'i';
		} else {
			$nuevo_estado = 'a';
		}
		$cadena .= '<button class="btn btn-xs btn-link" onClick=cambiarEstado('.$id.',"'.$controller.'") id="estado'.$id.'" value="'.$nuevo_estado.'">';
		$tipo = 'remove';
		if ('a' == $estado) {
			$tipo = 'ok';
		}
		$cadena .= '<span class="glyphicon glyphicon-'.$tipo.' color-black" id="icon'.$id.'"></span>';
		$cadena .='</button>';
		$cadena .='</center>';
		return $cadena;
	}

	/**
	 *
	 */
	public function paginator($controller = null, $action = null, $pagina = null, $total = null) {
		if (null == $controller && null == $action && null == $pagina || null == $total) {
			return null;
		}
		$cadena  = '<div style="text-align : right;">';
		$cadena .= '<ul class="pagination pagination-sm">';
		if (1 == $pagina){
			$cadena .= '<li class="disabled"><a>&laquo</a></li>';
		} else {
			$cadena .= '<li><a onClick=buscar("'.$controller.'","'.$action.'",'.($pagina - 1).') >&laquo</a></li>';
		}
		$inicio = 1;
		$fin    = $total;
		if (11 < $total) {
			$inicio = $pagina - 5;
			$fin    = $pagina + 5;
			if ($inicio < 1) {
				$inicio = 1;
				$fin    = $inicio + 10;
			}
			if ($total < $fin) {
				$fin    = $total;
				$inicio = $fin - 10;
			}
		}
		for ($i = $inicio; $i <= $fin; $i++){
			if ($i == $pagina) {
				$cadena .= '<li class="active"><a>'.$i.'</a></li>';
			} else {
				$cadena .= '<li onClick=buscar("'.$controller.'","'.$action.'",'.$i.')><a>'.$i.'</a></li>';
			}
		}
		if ($total == $pagina){
			$cadena .= '<li class="disabled"><a>&raquo</a></li>';
		} else {
			$cadena .= '<li><a onClick=buscar("'.$controller.'","'.$action.'",'.($pagina + 1).')>&raquo</a></li>';
		}
		$cadena .= '</div>';
		return $cadena;
	}

	/**
	 *
	 */
	public function mensajeNoRegistros($col = 2) {
		$cadena  = '';
		$cadena .= '<td colspan="'.$col.'" class="alert alert-warning">'.
				   '<center>No existen registos que coincidan con la frase ingresada. </center>'.
				   '</td>';
		return $cadena;
	}

	/**
	 *
	 */
	public function acciones($id, $reporte = null) {
		$cadena  = '';
		$cadena .= '<td class="actions">';
		$cadena .= '<a class="btn btn-xs btn-default izquierdo"';
		$cadena .= '   href="'.$this->url(array('action' => 'view', $id)).'">';
		$cadena .= '     <span class="glyphicon glyphicon-search"></span>';
		$cadena .= '</a>';
		$cadena .= '</td>';
		if (true == $reporte) {
			$cadena .= '<td class="actions">';
			$cadena .= '<a class="btn btn-xs btn-success centro"';
			$cadena .= '   href="'.$this->url(array('action' => 'reporte', $id)).'">';
			$cadena .= '     <span class="glyphicon glyphicon-file"></span>';
			$cadena .= '</a>';
			$cadena .= '</td>';
		}
		$cadena .= '<td class="actions">';
		$cadena .= '<a class="btn btn-xs btn-primary centro"';
		$cadena .= '   href="'.$this->url(array('action' => 'edit', $id)).'">';
		$cadena .= '     <span class="glyphicon glyphicon-edit"></span>';
		$cadena .= '</a>';
		$cadena .= '</td>';
		$cadena .= '<td class="actions">';
		$cadena .= '<a class="btn btn-xs btn-warning derecho"';
		$cadena .= '   data-toggle="modal" data-target="#myModal"';
		$cadena .= '   onClick="asignarId('.$id.')">';
		$cadena .= '     <span class="glyphicon glyphicon-trash"></span>';
		$cadena .= '</a>';
		$cadena .= '</td>';
		return $cadena;
	}

	/**
	 *
	 */
	public function ascDesc() {
		$cadena  = '';
		$cadena .= '<span class="glyphicon glyphicon-chevron-up">';
		$cadena  = '';
		return $cadena;
	}












	
	/**
	 *
	 */
	public function limitePaginador($controller, $action, $pagina, $total, $limit) {
		$options = array(5,10,25,50);
		$cadena  = '';
		$cadena .= '<br>';
		$cadena .= '<div class="row">'.
				   '   <div class="col-xs-2">'.
				   '      <select id="limit"'.
				   '              class="form-control input-sm limitePaginador"'.
				   '              onChange='."'".'buscar("'.$controller.'", "'.$action.'", 1)'."'".'>';
		foreach ($options as $option) {
			$selected = '';
			if (0 == $limit - $option) {
				$selected = 'selected';
			}
			$cadena .= '<option value="'.$option.'" '.$selected.'> '.$option.' </option>';
		}
		$cadena .= '      </select>'.
				   '   </div>'.
				   '   <div class="col-xs-10">';
		$cadena .= $this->paginator($controller, $action, $pagina, $total);
		$cadena .= '	</div>'.
				   '</div>';
		$cadena .= '<br>';
		return $cadena;
	}












	
	/**
	 *
	 */
	public function crearBuscar($controller, $action, $mensaje, $band = true) {
		$url = $this->url(array('action' => 'add'));
		$cadena  = '';
		$cadena .= '<div class="row">'.
				   '   <div class="col-xs-7">';
		if ($mensaje) {
			$cadena .= '      <a href="'.$url.'"'.
					   '         class="btn btn-primary btn-sm"> '.$mensaje.
					   '         <span class="glyphicon glyphicon-file"></span>'.
					   '      </a>'.
					   '      <br>'.
					   '      <br>';
		}
		$cadena .=  '   </div>';
		if ($band) {
			$cadena .= '<div id="busqueda" style="text-align : right;" class="col-xs-5">'.
					   '   <input type="text"'.
					   '          placeholder="Buscar"'.
					   '          id="buscar"'.
					   '          onKeyUp='."'".'buscar("'.$controller.'", "'.$action.'", 1)'."'".
					   '          class="form-control input-sm">'.
					   '<br>'.
					   '</div>';
		} else {
			$cadena .= '<br>'.
					   '<br>';
		}
		

		$cadena .= '</div>';
		return $cadena;
	}

	/**
	 * Tipo de transacción
	 */
	public function tipoTransaccion($transaccion = null) {
		if (null == $transaccion) {
			return 'Error';
		}
		$cadena  = 'Empresa';
		$cadena .= ' <span class="glyphicon glyphicon-arrow-right"></span>';
		$cadena .= ' cliente';
		if ('c' === $transaccion) {
			$cadena = 'Cliente '.
					  '<span class="glyphicon glyphicon-arrow-right"></span>'.
					  ' empresa';
		}
		return $cadena;
	}

	/**
	 * Modal de advertencia
	 */
	public function modalAdvertencia($model) {
		$action = $this->url(array('action' => 'delete'));
		$name   = 'data['.$model.'][id]';
		$cadena  = '';
		$cadena .= '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		$cadena .= '   <div class="modal-dialog">';
		$cadena .= '      <div class="modal-content">';
		$cadena .= '         <div class="modal-header">';
		$cadena .= ' 		<button type="button" class="close" data-dismiss="modal">';
		$cadena .= '			<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>';
		$cadena .= '		</button>';
		$cadena .= '		<h4 class="modal-title" id="myModalLabel">Confirmación de eliminación de registro</h4>';
		$cadena .= '	</div>';
		$cadena .= '	<div class="modal-body">';
		$cadena .= '		Realmente quiere elimiar el registro <span id="registro_id"></span>';
		$cadena .= '	</div>';
		$cadena .= '	<div class="modal-footer">';
		$cadena .= '		<form action="'.$action.'" method="post">';
		$cadena .= '			<input type="hidden" id="id" name="'.$name.'">';
		$cadena .= '			<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>';
		$cadena .= '			<button type="submit" class="btn btn-danger">Elimiar</button>';
		$cadena .= '		</form>';
		$cadena .= '	</div>';
		$cadena .= '</div>';
		$cadena .= '</div>';
		$cadena .= '</div>';
		$cadena .= '<script>function asignarId(id){$("#registro_id").html(id);$("#id").val(id);}</script>';
		return $cadena;
	}
	
	public $genero = array(
		'n' => 'No configurado',
		'f' => 'Femenino',
		'm' => 'Masculino',
	);
	public $ecivil = array(
		'n' => 'No configurado',
		's' => 'Soltero/a',
		'c' => 'Casado/a',
	);
	public $fcontacto = array(
		'n' => 'No configurado',
		'e' => 'E-mail',
		't' => 'Teléfono',
	);
		public $tipo_transaccion = array(
		'e' => 'Empresa - cliente',
		'c' => 'Cliente - empresa',
	);

	/**
	 *
	 */

	public function paginatorTest($controller, $pagina, $total, $limit, $role = 'null') {
		$options = array(5,10,25,50);
		$cadena  = '';
		$cadena .= '<div class="row">'.
				   '   <div class="col-xs-2">'.
				   '      <select id="limit"'.
				   '              class="form-control input-sm limitePaginador"'.
				   '              onChange='."'".'searchTest("'.$controller.'", "1", "'.$role.'")'."'".'>';
		foreach ($options as $option) {
			$selected = '';
			if (0 == $limit - $option) {
				$selected = 'selected';
			}
			$cadena .= '<option value="'.$option.'" '.$selected.'> '.$option.' </option>';
		}
		$cadena .= '      </select>'.
				   '   </div>'.
				   '   <div class="col-xs-10">';
		if ('null' == $role) {
			$cadena .= $this->paginator($controller, $pagina, $total);	
		} else {
			$cadena .= $this->paginator($controller, $pagina, $total, $role);
		}
		$cadena .= '	</div>'.
				   '</div>';
		return $cadena;
	}

		/**
	 *
	 */
	public function eliminar($id) {
		$cadena  = '';
		$cadena .= '<td class="actions">';
		$cadena .= '<center><a class="btn btn-xs btn-warning derecho"';
		$cadena .= '   data-toggle="modal" data-target="#myModal"';
		$cadena .= '   onClick="asignarId('.$id.')">';
		$cadena .= '     &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;&nbsp;';
		$cadena .= '</a></center>';
		$cadena .= '</td>';
		return $cadena;
	}


	/**
	 *
	 */
	public function una($id) {
		$cadena  = '';
		
		$cadena .= '<td class="actions">';
		$cadena .= '<center><a class="btn btn-xs btn-warning derecho"';
		$cadena .= '   href="'.$this->url(array('action' => 'view', $id)).'">';
		$cadena .= '     &nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-search"></span>&nbsp;&nbsp;&nbsp;';
		$cadena .= '</a></center>';
		$cadena .= '</td>';
		
		return $cadena;
	}





	/**
	 *
	 *
	public function limitePaginador($controller, $pagina, $total, $limit, $role = 'null') {
		$options = array(5,10,25,50);
		$cadena  = '';
		$cadena .= '<div class="row">'.
				   '   <div class="col-xs-2">'.
				   '      <select id="limit"'.
				   '              class="form-control input-sm limitePaginador"'.
				   '              onChange='."'".'buscarTemp("'.$controller.'", "1", "'.$role.'")'."'".'>';
		foreach ($options as $option) {
			$selected = '';
			if (0 == $limit - $option) {
				$selected = 'selected';
			}
			$cadena .= '<option value="'.$option.'" '.$selected.'> '.$option.' </option>';
		}
		$cadena .= '      </select>'.
				   '   </div>'.
				   '   <div class="col-xs-10">';
		if ('null' == $role) {
			$cadena .= $this->paginator($controller, $pagina, $total);	
		} else {
			$cadena .= $this->paginator($controller, $pagina, $total, $role);
		}
		$cadena .= '	</div>'.
				   '</div>';
		return $cadena;
	}
	*/




	/**
	 *
	 */
	public function crearBuscarHijo($controller, $action, $mensaje, $band, $role = null) {
		$url = $this->url(array('action' => 'add'));
		if (null != $role) {
			$url = $this->url(array('action' => 'add', $role));
		}
		$cadena  = '';
		$cadena .= '<div class="row">'.
				   '   <div class="col-xs-7">';
		if ($mensaje) {
			$cadena .= '      <button'.
					   '          data-toggle="modal" data-target="#addModal"'.
					   '         class="btn btn-primary btn-sm"> '.$mensaje.
					   '         <span class="glyphicon glyphicon-file"></span>'.
					   '      </button>'.
					   '      <br>'.
					   '      <br>';
		}
		$cadena .=  '   </div>';
		if ($band) {
			$cadena .= '<div id="busqueda" style="text-align : right;" class="col-xs-5">'.
					   '   <input type="text"'.
					   '          placeholder="Buscar"'.
					   '          id="buscar"'.
					   '          onKeyUp='."'".'buscar("'.$controller.'", "'.$action.'", 1)'."'".
					   '          class="form-control input-sm">'.
					   '<br>'.
					   '</div>';
		} else {
			$cadena .= '<br>'.
					   '<br>';
		}
		

		$cadena .= '</div>';
		return $cadena;
	}


	/**
	 * Modal de advertencia
	 */
	public function modalAdvertenciaAjax($model) {
		$action = $this->url(array('action' => 'delete'));
		$name   = 'data['.$model.'][id]';
		$cadena  = '';
		$cadena .= '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">';
		$cadena .= '   <div class="modal-dialog">';
		$cadena .= '      <div class="modal-content">';
		$cadena .= '         <div class="modal-header">';
		$cadena .= ' 		<button type="button" class="close" data-dismiss="modal">';
		$cadena .= '			<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>';
		$cadena .= '		</button>';
		$cadena .= '		<h4 class="modal-title" id="myModalLabel">Confirmación de eliminación de registro</h4>';
		$cadena .= '	</div>';
		$cadena .= '	<div class="modal-body">';
		$cadena .= '		Realmente quiere elimiar el registro <span id="registro_id"></span>';
		$cadena .= '		<input type="hidden" id="id">';
		$cadena .= '	</div>';
		$cadena .= '	<div class="modal-footer">';
		$cadena .= '	   <button id="delete-button" class="btn btn-danger">Elimiar</button>';
		$cadena .= '	</div>';
		$cadena .= '</div>';
		$cadena .= '</div>';
		$cadena .= '</div>';
		$cadena .= '<script>function asignarId(id){$("#registro_id").html(id);$("#id").val(id);}</script>';
		return $cadena;
	}
}
