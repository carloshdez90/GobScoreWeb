<!DOCTYPE html>
<!--

-->
<html lang="en">
    
    <head>
		<script type="text/javascript">
			var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
			$.fn.bootstrapBtn = bootstrapButton            // give $().bootstrapBtn the bootstrap functionality
		</script>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GobScore El Salvador</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
		<?php echo $this->Html->css('bootstrap'); ?>
		<?php echo $this->Html->css('bootstrap-responsive'); ?>
		<?php echo $this->Html->css('style'); ?>
		<?php echo $this->Html->css('pluton'); ?>
        
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
		


    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <?php echo $this->Html->image('../images/GobScore.png', array("width"=>"120", "height"=>"40", "alt"=>"Logo")); ?>
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active">
                                <a href="#home">Mensajes Recibidos</a>
                            </li>
                            <li>
                                <a href="#service">Rendicion de cuentas</a>
                            </li>
                            <li>
                                <a href="#clients">Salir</a>
                            </li>  
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
		
		
        
		
		
        <div id="contact" class="contact">
            <div class="section secondary-section" style="background:white;">
                <div class="container">
                    <div class="title">

                    </div>
						<?php echo $this->Session->flash(); ?>
						<?php echo $this->fetch('content'); ?>
                </div>
				
				
            </div>
        </div>
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <div class="footer">
            <p>&copy; 2014 power by Geekoders</p>




        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
		
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>

        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
        <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>

    </body>
</html>