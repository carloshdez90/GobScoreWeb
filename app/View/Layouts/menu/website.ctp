


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
			<a class="navbar-brand brand" href="#">
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
				<li>
                                        <a href="#" id="seguimiento" style="color:white !important;">Seguimiento</a>
                                </li>
				<li>
                                        <a href="#" id="ingresar" style="color:white !important;">Ingresar</a>
                                </li>

				<script>
					$('#rendicion').click(function (){
						window.location.href = '<?php echo $this->Html->url(array('action' => 'rendicionCuentas'))?>';
					});
					$('#seguimiento').click(function (){
						window.location.href = '<?php echo $this->Html->url(array('action' => 'seguimiento'))?>';
					});
					$('#ingresar').click(function (){
						window.location.href = '<?php echo $this->Html->url(array('controller' =>'users', 'action' => 'login'))?>';
					});
				</script>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>
