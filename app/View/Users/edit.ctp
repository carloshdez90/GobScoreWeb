<div class="users form">
	<legend><?php echo __('Edit User'); ?></legend>

	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<?php echo $this->Form->input('id'); ?>
		<?php include 'form.ctp'; ?>
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
