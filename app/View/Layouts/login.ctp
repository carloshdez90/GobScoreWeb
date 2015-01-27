<!DOCTYPE html>
<html lang="en">
    <head>
        <title>GobScore Admin</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<?php echo $this->Html->css('administracion/css/bootstrap.min'); ?>
		<?php echo $this->Html->css('administracion/css/font-awesome'); ?>
		<?php echo $this->Html->css('administracion/css/unicorn-login'); ?>

		<?php echo $this->Html->css('administracion/js/respond.min'); ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
									 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
									 })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-44987299-1', 'bootstrap-hunter.com');
			ga('send', 'pageview');

        </script></head>    <body>
			<div id="container">
				<div id="logo">
					<?php echo $this->Html->image('administracion/img/logo.png'); ?>
				</div>
				<div id="user">
					<div class="avatar">
						<div class="inner"></div>
						<?php echo $this->Html->image('administracion/img/av1_1.jpg'); ?>
					</div>
					<div class="text">
						<h4>Hello,<span class="user_name"></span></h4>
					</div>
				</div>
				<div id="loginbox">
					<?php echo $this->fetch('content'); ?>

					<form id="recoverform" action="#">
						<p>Enter your e-mail address below and we will send you instructions how to recover a password.</p>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-envelope"></i></span><input class="form-control" type="text" placeholder="E-mail address" />
						</div>
						<div class="form-actions clearfix">
							<div class="pull-left">
								<a href="#loginform" class="grey flip-link to-login">Click para Ingresar</a>
							</div>
							<div class="pull-right">
								<a href="#registerform" class="blue flip-link to-register">Create new account</a>
							</div>
							<input type="submit" class="btn btn-block btn-inverse" value="Recover" />
						</div>
					</form>
					
				</div>
			</div>
			
			<?php echo $this->Html->css('administracion/js/jquery.min'); ?>
			<?php echo $this->Html->css('administracion/js/jquery-ui.custom.min'); ?>
			<?php echo $this->Html->css('administracion/js/unicorn.login'); ?>
		</body>
</html>
