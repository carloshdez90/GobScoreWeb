<?php $band = true; ?>
<?php $mensaje = 'Crear '.$modelo; ?>
<?php $reporte = true; ?>

<button class="btn btn-primary" id="nuevos">
	Formularios nuevos
</button>
<button class="btn btn-default" id="anteriores">
	Formularios anteriores
</button>

<br>
<br>

<?php include ROOT.'/app/View/App/index.ctp'; ?>

<script>
	var controller = '<?php echo $controller; ?>';
	var estado = -1;
	var implementation = '>=';
	
	function buscar(controller, action, pagina) {
		$.ajax({
			type    : 'get',
			url     : 'http://'+servidor+'/'+controller+'/'+action,
			data    : {
				adicional : {
					'index' : 'implementation',
					'value' : implementation,
				}, 
				estado : estado,
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
	
	$('#nuevos').click(function () {
		implementation = '>=';
		buscar(controller,'pagination',1);
	})
	$('#anteriores').click(function () {
		implementation = '<';
		buscar(controller,'pagination',1);
	})


</script>