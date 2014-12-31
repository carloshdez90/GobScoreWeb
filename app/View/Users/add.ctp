<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"> <?php echo __('Crear usuario'); ?> </h3>
	</div>
	<div class="panel-body">
		<?php echo $this->Form->create('User'); ?>
		<fieldset>
			<?php include 'form.ctp'; ?>

			<!-- Usuarios -->
		</fieldset>
		<?php echo $this->Form->end(); ?>
	</div>
</div>