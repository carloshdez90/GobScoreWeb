<div class="forms form">
	<?php echo $this->Form->create('Form'); ?>
	<fieldset>
		<legend><?php echo __('Edit Form'); ?></legend>
		<?php
		echo $this->Form->input('id');
		?>
		<?php include 'form.ctp'; ?>
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
