<?php $band = true; ?>
<?php $mensaje = false; ?>

<button class="btn btn-primary" id="nuevos">
	Nuevos
</button>
<button class="btn btn-default" id="vistos">
	Leidos
</button>
<button class="btn btn-success" id="resueltos">
	Resueltos
</button>


<?php include ROOT.'/app/View/Denuncias/app_index.ctp'; ?>

<script>
	var controller = '<?php echo $controller; ?>';
	var estado = -1;
	
	function buscar(controller, action, pagina) {
		$.ajax({
			type    : 'get',
			url     : 'http://'+servidor+'/'+controller+'/'+action,
			data    : {
				adicional : {
					'index' : 'estado',
					'value' : estado,
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
		estado = -1;
		buscar(controller,'pagination',1);
	})
	$('#vistos').click(function () {
		estado = 0;
		buscar(controller,'pagination',1);
	})
	$('#resueltos').click(function () {
		estado = 1;
		buscar(controller,'pagination',1);
	})

</script>