<?php echo $this->Html->script('jquery'); ?>
<?php echo $this->Html->script('servidor'); ?>

<script>
	var servidor = '162.243.55.11:3000';
	//servidor = 'localhost:3000';
	servidor = 'localhost/gobscore'
	$.ajax({
		'type' : 'post',
		'url'  : 'http://'+servidor+'/services/guardarDenuncia',
		'data' : {
			'delation_institution' : "1",
			'delation_info' : 4,
			'name': "juan perez",
			'email': "juan@perez.com",
			'message': "dejo su puesto de trabajo"
		},
		'success' : function (data) {
			console.log(data.result)
		}
	});
</script>
