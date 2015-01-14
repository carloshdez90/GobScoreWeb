<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Rendicion</title>
	</head>

	<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

	<?php echo $this->Html->css('style2'); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<body>
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
						<?php echo $this->Html->image('images/GobScore.png', array('width' => 120, 'height' => 40)); ?>
					</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse left-navbar" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						
						<li>
							<a href="#home">Inicio</a>
						</li>
						<li>
							<a href="#service">GobScore</a>
						</li>
						<li>
							<a href="#portfolio">Ranking</a>
						</li>
						<li>
							<a href="#clients">Interacciones</a>
						</li>
						
						<li>
							<a href="#contact">Participar</a>
						</li>
						<li>
							<a id="openBtn">Ingresar</a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
		
		<div class="container-fluid">
			<div class="row">
	  			<div class="col-md-2"></div>
	  			<div class="col-md-8">
					<div class="alert banner" role="alert">
						<p>
					La democracia implica rendición de cuentas, tambien es tu deber como ciudadano participar, <strong>Gobscore</strong> te empodera para que puedas evaluar el trabajo realizado por las instituciones gubernamentales que estan a tu servicio.
						</p>
					</div>
	  			</div>
	  			<div class="col-md-2"></div>
			</div>
		</div>

		
		<?php echo $this->fetch('content'); ?>
		
		
		
	    <div class="footer">
            <p>&copy; 2013 All Rights Reserved | GobScore | Developer by <a href="http://geekoders.com"> <button class="btn btn-primary"> Geekoders </button> </a></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
			<a href="#">
				<i class="icon-up-open"></i>
			</a>
			<script>
    			$(document).on('ready', function(){
    				$('.question').hide();
    				$('.select-item').on('click', function() {
    					console.log($(this).data('institucion'));
    					$('.list-institution').fadeOut('fast', function() {
    						// body...
    																	$('.question').fadeIn();
    					});
    					

    				});
    			});
			</script>

	</body>
</html>