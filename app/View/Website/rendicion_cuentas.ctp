
<div class="row">
	<div class="col-sm-3">
		<div class="list-group">
			<a class="list-group-item active"> Formularios </a>
			<a class="list-group-item" onClick="getFormulario(1)"> Formulario 1 </a>
		</div>
	</div>
	<div class="col-sm-9">
		<div id="encuesta">
		</div>
	</div>
</div>

<script>
	var servidor = 'localhost/encuestas';
	var form_id  = null;
	function getFormulario(form_id) {
		$.ajax(
			{
				'url' : 'http://'+servidor+'/website/getFormulario/'+form_id,
				'type' : 'post',
				'data' : {},
				'success' : function (data) {
					$('#encuesta').html(data);
				}
			}
		);	
	}
</script>