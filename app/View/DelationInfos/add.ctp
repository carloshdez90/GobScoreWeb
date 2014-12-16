<div class="delationInfos form">
<?php echo $this->Form->create('DelationInfo'); ?>
	<fieldset>
		<legend><?php echo __('Add Delation Info'); ?></legend>
	<?php
		echo $this->Form->input('email');
		echo $this->Form->input('kind');
		echo $this->Form->input('phone');
		echo $this->Form->input('created_at');
		echo $this->Form->input('updated_at');
		echo $this->Form->input('sms_key');
		echo $this->Form->input('delation_institutions_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Delation Infos'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Delation Institutions'), array('controller' => 'delation_institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delation Institutions'), array('controller' => 'delation_institutions', 'action' => 'add')); ?> </li>
	</ul>
</div>
