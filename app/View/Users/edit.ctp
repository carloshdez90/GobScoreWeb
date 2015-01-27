<div class="users form">
	<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<?php echo $this->Form->input('id'); ?>
		<?php include 'form.ctp'; ?>
	</fieldset>
	<?php echo $this->Form->end(); ?>
</div>
