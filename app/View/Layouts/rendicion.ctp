<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Rendicion</title>
	</head>

	<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext"
		  rel="stylesheet" type="text/css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet"
		  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

	<?php echo $this->Html->css('jRating.jquery'); ?>
	<?php echo $this->Html->css('style2'); ?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<?php echo $this->Html->script('jRating.jquery'); ?>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

	
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<body>

		<?php include 'menu/website.ctp'; ?>
		
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