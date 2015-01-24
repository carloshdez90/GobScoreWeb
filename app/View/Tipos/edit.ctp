<div class="tipos form">
	<?php echo $this->Form->create('Tipo'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tipo'); ?></legend>
		<?php echo $this->Form->input('id'); ?>
		<?php include 'form.ctp'; ?>
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
