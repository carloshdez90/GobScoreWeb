<?php echo $this->Html->css('bootstrap.min'); ?>


<?php echo $this->Html->script('servidor'); ?>
<?php echo $this->Html->script('jquery.min'); ?>


<div class="container-fluid list-institution" id="list-institution">
	<div class="row">
	  	<div class="col-md-2"></div>
	  	<div class="col-md-8">
			<div class="panel info-panel panel-primary">
				<!-- Default panel contents -->
				<div class="panel-heading">Seleccione la institucion</div>
				<div class="panel-body">
					<p>Escoga la institución</p>
				</div>

				<!-- List group -->
				<div class="list-group">
					<?php foreach($forms as $form): ?>
						<a class="list-group-item select-item"
						   data-institucion="2"
						   onClick="getFormulario(<?php echo $form['Form']['id']; ?>)">
							<?php echo $form['Form']['name']; ?>
						</a>
					<?php endforeach; ?>
				</div>
			</div>
	  	</div>
	  	<div class="col-md-2"></div>
	</div>
</div>


<div class="container-fluid question">
	<div class="row">
	  	<div class="col-md-2"></div>
	  	<div class="col-md-8">
			<div id="encuesta">
			</div>
	  	</div>
	  	<div class="col-md-2"></div>
	</div>
</div>

<script>
	function getFormulario(form_id) {
		$.ajax({
			'url'  : 'http://'+servidor+'/website/getFormulario/'+form_id,
			'type' : 'post',
			'data' : {},
			'success' : function (data) {
				$('#encuesta').html(data);
			}
		});
	}
</script>

