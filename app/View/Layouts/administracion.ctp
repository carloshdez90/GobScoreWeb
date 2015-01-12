<!DOCTYPE html>
<html lang="en">
	<head>
		<title>GobScore Admin</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		

		<?php echo $this->Html->css('administracion/css/bootstrap.min'); ?>
		<?php echo $this->Html->css('administracion/css/font-awesome'); ?>
		<?php echo $this->Html->css('administracion/css/fullcalendar'); ?>
		<?php echo $this->Html->css('administracion/css/jquery.jscrollpane'); ?>
		<?php echo $this->Html->css('administracion/css/unicorn'); ?>
		<?php echo $this->Html->css('estilos'); ?>
		
		<!--[if lt IE 9]>
		<script type="text/javascript" src="js/respond.min.js"></script>
		<![endif]-->
		
		<?php echo $this->Html->script('jquery.min'); ?>

	</head>	
	<body data-color="grey" class="flat">
		<div id="wrapper">
			<div id="header">
				<h1><a href="./index.html">GobScore</a></h1>
				
				<a id="menu-trigger" href="#"><i class="fa fa-bars"></i></a>	
			</div>
			
			<div id="user-nav">
	            <ul class="btn-group">
					
					
	                <li class="btn"><a title="" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout')); ?>"><i class="fa fa-user"></i> <span class="text">Cerrar sesión</span></a></li>
	            </ul>
	        </div>
			
			<div id="sidebar">
				
				<ul>
					
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'forms', 'action' => 'index')); ?>">
							<i class="fa fa-th-list"></i> <span>Formularios</span></a>
					</li>
					
					<li >
						<a href="<?php echo $this->Html->url(array('controller' => 'denuncias', 'action' => 'index')); ?>"><i class="fa fa-bullhorn"></i> <span>Denuncias</span></a>
					</li>
					
				</ul>
			</div>
			
			<div id="content">
				
				<div id="breadcrumb">
					<a href="#" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> Inicio</a>
					<a href="#" class="current">Instituciones</a>
				</div>
				
				<div class="row">
					<div class="col-xs-12">
						<div class="widget-box">
							<div class="widget-title">
								<span class="icon">
									<i class="fa fa-th"></i>
								</span>
								<h5>Static table</h5>
							</div>
							<div class="widget-content nopadding">
								<br>
								<?php echo $this->fetch('content'); ?>							
							</div>
						</div>
					</div>
				</div>
			</div>

			
			<div class="row">
				<div id="footer" class="col-xs-12">
					2014 - 2015 &copy; Gobscore Admin. Powered by <a href="http://geekoders.com">Geekoders</a>
				</div>
			</div>
		</div>

		<?php echo $this->Html->script('administracion/js/excanvas.min'); ?>
		<?php echo $this->Html->script('administracion/js/jquery.min'); ?>
		<?php echo $this->Html->script('administracion/js/jquery-ui.custom'); ?>
		<?php echo $this->Html->script('administracion/js/bootstrap.min'); ?>
		<?php echo $this->Html->script('administracion/js/jquery.flot.min'); ?>
		<?php echo $this->Html->script('administracion/js/jquery.flot.resize.min'); ?>
		<?php echo $this->Html->script('administracion/js/jquery.sparkline.min'); ?>
		<?php echo $this->Html->script('administracion/js/fullcalendar.min'); ?>
		
		<?php echo $this->Html->script('administracion/js/jquery.nicescroll.min'); ?>
		<?php echo $this->Html->script('administracion/js/unicorn'); ?>
		<?php echo $this->Html->script('administracion/js/unicorn.dashboard'); ?>

		<?php echo $this->Html->script('jquery.min'); ?>
		<?php echo $this->Html->script('servidor'); ?>
		<?php echo $this->Html->script('pagination'); ?>
	</body>
</html>
