<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>Seguimiento</title>
	</head>

	<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext"
		  rel="stylesheet" type="text/css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet"
		  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">

	<?php echo $this->Html->css('jRating.jquery'); ?>
	<?php echo $this->Html->css('style-seguimiento'); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	
	<?php echo $this->Html->script('servidor'); ?>
	<?php echo $this->Html->script('jRating.jquery'); ?>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<body>

		<?php include 'menu/website.ctp'; ?>
		

		<?php echo $this->fetch('content'); ?>
		
		
		<div class="footer">
            <p>&copy; 2015 All Rights Reserved | GobScore | Developer by <a href="http://geekoders.com"> <button class="btn btn-primary"> Geekoders </button> </a></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
			<a href="#">
				<i class="icon-up-open"></i>
			</a>
	</body>
</html>
