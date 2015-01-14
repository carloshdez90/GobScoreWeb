<div class="container-fluid">
	<div class="row">
	  	<div class="col-md-2"></div>
	  	<div class="col-md-8">
			<div class="alert" role="alert" id="mensaje">
				<p class="state-message">
				</p>
			</div>
	  	</div>
	  	<div class="col-md-2"></div>
	</div>
</div>



<div class="container-fluid list-state">
	<div class="row">
	  	<div class="col-md-2"></div>
	  	<div class="col-md-8">
			<div class="btn-group btn-group-justified" role="group" aria-label="...">
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-info">
			    		<i class="glyphicon glyphicon-send state-icon"></i>
			    		<p class="state-text">Enviada</p>
					</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-primary">
			    		<i class="glyphicon glyphicon-check state-icon"></i>
			    		<p class="state-text">Leída</p>
					</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-success">
						<i class="glyphicon glyphicon-thumbs-up state-icon"></i>
			    		<p class="state-text">Resuelta</p>
					</button>
				</div>
			</div>
	  	</div>
	  	<div class="col-md-2"></div>
	</div>
</div>

<?php if (3 == $indice): ?>
	<div class="container-fluid" style="margin-top: 2em;">
		<div class="row">
	  		<div class="col-md-3"></div>
	  		<div class="col-md-6">

	  			<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Valora esta información</h3>
					</div>
					<div class="panel-body">
						<div class="basic" data-average="100" data-id="1" style="margin: 0 auto;">
						</div>				
					</div>
				</div>
	  		</div>
	  		<div class="col-md-3"></div>
		</div>
	</div>
<?php endif; ?>

<script>
    $(document).on('ready', function(){
		var mensaje = {};
		
    	mensaje[1] = 'GobScore ha enviado tu mensaje a la institución correspondiente, '+
				   'puedes dar seguimiento de tu caso por este medio, utilizando el '+
				   'código de referencia y tu correo electrónico.';
    	mensaje[2] = 'GobScore te informa que la institución ha recibido y leído tu mensaje. '+
				   'Cuando exista respuesta se te notificará por correo electrónico.';
    	mensaje[3] = 'La institución ha dado respuesta a tu mensaje, por favor revisa tu '+
				   'correo electrónico. Además Gobscore te invita valorar la utilidad de la '+
				   'respuesta brindada.';

		var indice = '<?php echo $indice; ?>';
		var clase  = '<?php echo $clase; ?>';

    	$('.state-message').html(mensaje[indice]);
		$('#mensaje').addClass(clase);
			
    	$(':radio').change(
			function(){
				$('.choice').text( this.value + ' stars' );
			} 
		);

		// 
      	// simple jRating call
		$(document).ready(function(){
			$(".basic").jRating({
				showRateInfo:false
			});
		});
		

    });
</script>