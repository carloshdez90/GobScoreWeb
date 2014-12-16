<div class="delationInfos index">
	<h2><?php echo __('Delation Infos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('email'); ?></th>
			<th><?php echo $this->Paginator->sort('kind'); ?></th>
			<th><?php echo $this->Paginator->sort('phone'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th><?php echo $this->Paginator->sort('sms_key'); ?></th>
			<th><?php echo $this->Paginator->sort('delation_institutions_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($delationInfos as $delationInfo): ?>
	<tr>
		<td><?php echo h($delationInfo['DelationInfo']['id']); ?>&nbsp;</td>
		<td><?php echo h($delationInfo['DelationInfo']['email']); ?>&nbsp;</td>
		<td><?php echo h($delationInfo['DelationInfo']['kind']); ?>&nbsp;</td>
		<td><?php echo h($delationInfo['DelationInfo']['phone']); ?>&nbsp;</td>
		<td><?php echo h($delationInfo['DelationInfo']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($delationInfo['DelationInfo']['updated_at']); ?>&nbsp;</td>
		<td><?php echo h($delationInfo['DelationInfo']['sms_key']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($delationInfo['DelationInstitutions']['name'], array('controller' => 'delation_institutions', 'action' => 'view', $delationInfo['DelationInstitutions']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $delationInfo['DelationInfo']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $delationInfo['DelationInfo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $delationInfo['DelationInfo']['id']), array(), __('Are you sure you want to delete # %s?', $delationInfo['DelationInfo']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Delation Info'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Delation Institutions'), array('controller' => 'delation_institutions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Delation Institutions'), array('controller' => 'delation_institutions', 'action' => 'add')); ?> </li>
	</ul>
</div>
