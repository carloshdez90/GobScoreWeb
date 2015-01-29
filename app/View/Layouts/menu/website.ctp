

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand brand" href="<?php echo $this->Html->url(array('action' => 'inicio')) ?>">
				<?php echo $this->Html->image('GobScore.png', array('width' => '120', 'height' => '40', 'alt' => 'Logo')); ?>
			</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse left-navbar" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right">
				<?php $inicio = $this->Html->url(array('controller' => 'website', 'action' => 'inicio')); ?>
				<li>
					<a href="<?php echo $inicio; ?>" style="color:white !important;">Inicio</a>
				</li>
				<!-- 
				<li>
                    <a href="#" id="seguimiento" style="color:white !important;" data-toggle="modal" data-target="#myModal">Seguimiento</a>
                </li>
				<li>
                    <a href="#" id="ingresar" style="color:white !important;">Ingresar</a>
                </li>
				<!--  -->
				<script>
					$(document).on('ready', function(){
						$('#rendicion').click(function (){
							window.location.href = '<?php echo $this->Html->url(array('action' => 'rendicionCuentas'))?>';
						});
						$('.seguimiento-modal').click(function (){
							window.location.href = '<?php echo $this->Html->url(array('action' => 'seguimiento'))?>';
						});
						$('#ingresar').click(function (){
							window.location.href = '<?php echo $this->Html->url(array('controller' =>'users', 'action' => 'login'))?>';
						});
					});
				</script>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

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
