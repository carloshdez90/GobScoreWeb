<?php

$mensaje = '';
if ($eliminar) {
	$mensaje = 'Agregar '.$modelo;
	if('Question' == $modelo) {
		$mensaje = 'Agregar pregunta';
	}
}

?>
<div class="">
	<!--  --
	<h2 class="text-align-right"><?php echo __($modelo); ?></h2>
	<!--  -->
	<?php echo $this->Html->crearBuscarHijo($controller, 'paginationAjax', $mensaje, $total); ?>
	<div id="pagination">
		<?php if ($registros): ?>
			<?php include ROOT.'/app/View/App/tabla_ajax.ctp'; ?>
			<?php echo $this->Html->limitePaginador($controller, 'paginationAjax', $pagina, $total, $limit); ?>
		<?php endif; ?>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agregar</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
						<label for="message-text" class="control-label">Pregunta:</label>
						<textarea class="form-control" id="question"></textarea>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" id="close-button">Cerrar</button>
				<button type="button" class="btn btn-primary" id="save-button">Guardar pregunta</button>
			</div>
		</div>
	</div>
</div>





<script>
	var controller = '<?php echo $controller; ?>';
	var pagina = '<?php echo $pagina; ?>';
	var total = '<?php echo $total; ?>';
	var limit = '<?php echo $limit; ?>';
	
	$('#save-button').click(function () {
		$.ajax({
			'type' : 'post',
			'url'  : 'http://'+servidor+'/'+controller+'/addAjax',
			'data' : {
				name    : $('#question').val(),
				form_id : form_id,
			},
			'success' : function (data) {
				alert(data.mensaje);
				$('#close-button').click();
				buscar(controller, 'paginationAjax', pagina, total, limit);
				$('#question').val('');
			}
 		});
	});

	
	
	function buscar(controller, action, pagina) {
		$.ajax({
			type    : 'get',
			url     : 'http://'+servidor+'/'+controller+'/'+action,
			data    : {
				foreign : 'form_id',
 				form_id : form_id,
				pagina : pagina,
				buscar : $('#buscar').val(),
				limit  : $('#limit').val()
			},
			success : function (data) {
				$('#pagination').html(data);
			},
			error   : function(e) {
				alert(pagina)
				alert("An error occurred: " + e.responseText.message);
			}
		});	
	}

</script>
