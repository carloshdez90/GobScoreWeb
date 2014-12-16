<div class="delationInstitutions view">
<h2><?php echo __('Delation Institution'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($delationInstitution['DelationInstitution']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($delationInstitution['DelationInstitution']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($delationInstitution['DelationInstitution']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created At'); ?></dt>
		<dd>
			<?php echo h($delationInstitution['DelationInstitution']['created_at']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated At'); ?></dt>
		<dd>
			<?php echo h($delationInstitution['DelationInstitution']['updated_at']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Delation Institution'), array('action' => 'edit', $delationInstitution['DelationInstitution']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Delation Institution'), array('action' => 'delete', $delationInstitution['DelationInstitution']['id']), array(), __('Are you sure you want to delete # %s?', $delationInstitution['DelationInstitution']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Delation Institutions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delation Institution'), array('action' => 'add')); ?> </li>
	</ul>
</div>
