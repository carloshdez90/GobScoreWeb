<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"> <?php echo __('Edit Institucion'); ?> </h3>
	</div>
	<div class="panel-body">
		
		<?php echo $this->Form->create('Institucion'); ?>
		<fieldset>
			<?php echo $this->Form->input('id'); ?>
			<?php include 'form.ctp'; ?>
		</fieldset>
		<?php echo $this->Form->end(); ?>
		
	</div>
</div>