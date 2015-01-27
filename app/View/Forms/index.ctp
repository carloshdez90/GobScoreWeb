<?php $band = true; ?>
<?php $mensaje = false; ?>
<?php $reporte = true; ?>

<a class="btn btn-primary btn-sm" href="<?php echo $this->Html->url(array('action' => 'add')); ?>">
	Crear formulario
</a>
<button class="btn btn-default btn-sm" id="anteriores">
	Formularios abiertos
</button>
<button class="btn btn-success btn-sm" id="nuevos">
	Formularios cerrados
</button>


<br>
<br>

<?php include ROOT.'/app/View/App/index.ctp'; ?>

<script>
	var controller = '<?php echo $controller; ?>';
	var estado = -1;
	var contestados = 1;
	
	function buscar(controller, action, pagina) {
		$.ajax({
			type    : 'get',
			url     : 'http://'+servidor+'/'+controller+'/'+action,
			data    : {
				adicional : {
					'index' : 'contestados',
					'value' : contestados,
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
		contestados = 1;
		buscar(controller,'pagination',1);
	})
	$('#anteriores').click(function () {
		contestados = 0;
		buscar(controller,'pagination',1);
	})


</script>