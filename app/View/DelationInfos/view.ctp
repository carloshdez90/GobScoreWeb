<div class="delationInfos view">
<h2><?php echo __('Delation Info'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($delationInfo['DelationInfo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($delationInfo['DelationInfo']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Kind'); ?></dt>
		<dd>
			<?php echo h($delationInfo['DelationInfo']['kind']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($delationInfo['DelationInfo']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($delationInfo['DelationInfo']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($delationInfo['DelationInfo']['updated_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sms Key'); ?></dt>
		<dd>
			<?php echo h($delationInfo['DelationInfo']['sms_key']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Delation Institutions'); ?></dt>
		<dd>
			<?php echo $this->Html->link($delationInfo['DelationInstitutions']['name'], array('controller' => 'delation_institutions', 'action' => 'view', $delationInfo['DelationInstitutions']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Delation Info'), array('action' => 'edit', $delationInfo['DelationInfo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Delation Info'), array('action' => 'delete', $delationInfo['DelationInfo']['id']), array(), __('Are you sure you want to delete # %s?', $delationInfo['DelationInfo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Delation Infos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delation Info'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Delation Institutions'), array('controller' => 'delation_institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delation Institutions'), array('controller' => 'delation_institutions', 'action' => 'add')); ?> </li>
	</ul>
</div>
