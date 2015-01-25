<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel" style="color: dodgerblue;">Ingreso al Seguimiento de Denuncias</h3>
	</div>
	
	<div class="modal-body">
		<p style="color:darkslategray; text-align:justify">Para consultar el estado de su denuncia, introduzca su dirección de correo electrónico y el código de referencia que le fue enviado.</p>
 		<div class="row center">
			<div class="input-prepend">
				<span class="add-on" style="background-color: lightskyblue;">@</span>
				<input class="input-large"
					   id="email-modal"
					   type="text" placeholder="Correo electrónico"
					   name="data[email]"
					   >
			</div>
			<br>
			<div class="input-prepend">
				<span class="add-on" style="background-color:lightskyblue;">#</span>
				<input class="input-large"
					   id="cod-referencia-modal"
					   type="text" placeholder="Código de Referencia"
					   name="data[codigo]"
					   >
			</div>

		</div>

	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
		<button class="btn btn-primary seguimiento-modal"
				id="verificacion">Ingresar</button>
	</div>
	<div class="hide">
		<form action="<?php echo $this->Html->url(array('action' => 'seguimiento')) ?>"
			  method="POST">
			<input type="hidden" id="email" name="data[email]">
			<input type="hidden" id="codigo" name="data[codigo]">
			<input type="submit" id="submit">
		</form>
	</div>
	<script>
		$('#verificacion').click(function () {
			$.ajax({
				'type' : 'post',
				'url'  : 'http://'+servidor+'/verificacion',
				'data' : {
					'email'  : $('#email-modal').val(),
					'codigo' : $('#cod-referencia-modal').val(),
				},
				'success' : function (data) {
					if (data.error) {
						return alert('Datos incorrectos, intentelo de nuevo.')
					}
					$('#email').val(data.email);
					$('#codigo').val(data.codigo);
					$('#submit').click();
				}
			});
		});
	</script>
</div>
