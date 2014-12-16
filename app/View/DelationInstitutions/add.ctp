<div class="delationInstitutions form">
<?php echo $this->Form->create('DelationInstitution'); ?>
	<fieldset>
		<legend><?php echo __('Add Delation Institution'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('slug');
		echo $this->Form->input('created_at');
		echo $this->Form->input('updated_at');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Delation Institutions'), array('action' => 'index')); ?></li>
	</ul>
</div>
