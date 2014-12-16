<div class="institucions form">
	<?php echo $this->Form->create('Institucion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Institucion'); ?></legend>
		<?php echo $this->Form->input('id'); ?>
		<?php include 'form.ctp'; ?>
	</fieldset>
	<?php echo $this->Form->end(); ?>
	<?php echo $this->Form->end(); ?>
</div>
