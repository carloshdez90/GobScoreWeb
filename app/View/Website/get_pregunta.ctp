<center>
	<?php if ($question['Question']['name']): ?>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Contesta la siguiente pregunta</h3>
			</div>
			<div class="panel-body info-panel-question">
				<p>
					<?php echo $question['Question']['name']; ?>
				</p>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3"></div>
						<div class="col-md-6">
			    			<div class="btn-group btn-group-justified" role="group" aria-label="...">
								<div class="btn-group" role="group">
									<button type="button"
											class="btn btn-primary"
											onClick="calificarPregunta(0)">Si</button>
								</div>
								<div class="btn-group" role="group">
									<button type="button"
											class="btn btn-warning"
											onClick="calificarPregunta(0)">No</button>
								</div>
							</div>
						</div>
						<div class="col-md-3"></div>
					</div>
				</div>
			</div>
		</div>

		
		<script>
			function calificarPregunta(nota) {
				$.ajax({
					'url' : 'http://'+servidor+'/website/calificarPregunta/'+<?php echo $question['Question']['id']; ?>+'/'+nota,
					'type' : 'post',
					'data' : {},
					'success' : function (data) {
						if (data) {
							getPregunta();	
						}
					}
				});
			}
		</script>

	<?php else: ?>
		<h4 class="center"> Ya has contestado este formulario. </h4>
	<?php endif; ?>
</center>



