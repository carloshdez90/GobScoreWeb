<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $cakeDescription ?>:
			<?php echo $title_for_layout; ?>
		</title>
		<?php
		echo $this->Html->meta('icon');
		
		echo $this->Html->css('bootstrap');


		echo $this->Html->css('login');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-theme.min');
		echo $this->Html->css('estilos');
		
		echo $this->Html->script('jquery.min');
		echo $this->Html->script('bootstrap.min');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
	</head>
	<body>
		<div class="">
			<header>
				<h1></h1>
			</header>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="hero-unit" style="width:350px; margin: auto">
							<div class="row">
								<div class="col-md-12 caja">
									<?php $mensaje = $this->Session->flash(); ?>
									<?php if (null != $mensaje): ?>
										<div class="alert alert-error" style="text-align : center;">
											<?php echo $mensaje; ?>
										</div>
									<?php endif;?>
									<?php echo $this->fetch('content'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer>
			</footer>
		</div>
	</body>
</html>
