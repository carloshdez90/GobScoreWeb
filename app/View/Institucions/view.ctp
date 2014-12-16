<div class="institucions view">
<h2><?php echo __('Institucion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($institucion['Institucion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($institucion['Institucion']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($institucion['Institucion']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($institucion['Institucion']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Institucion'), array('action' => 'edit', $institucion['Institucion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Institucion'), array('action' => 'delete', $institucion['Institucion']['id']), array(), __('Are you sure you want to delete # %s?', $institucion['Institucion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Institucions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institucion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Forms'), array('controller' => 'forms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Forms'); ?></h3>
	<?php if (!empty($institucion['Form'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Institucion Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($institucion['Form'] as $form): ?>
		<tr>
			<td><?php echo $form['id']; ?></td>
			<td><?php echo $form['name']; ?></td>
			<td><?php echo $form['status']; ?></td>
			<td><?php echo $form['institucion_id']; ?></td>
			<td><?php echo $form['created']; ?></td>
			<td><?php echo $form['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'forms', 'action' => 'view', $form['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'forms', 'action' => 'edit', $form['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'forms', 'action' => 'delete', $form['id']), array(), __('Are you sure you want to delete # %s?', $form['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Form'), array('controller' => 'forms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Users'); ?></h3>
	<?php if (!empty($institucion['User'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Institucion Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Updated'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($institucion['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['username']; ?></td>
			<td><?php echo $user['password']; ?></td>
			<td><?php echo $user['role']; ?></td>
			<td><?php echo $user['active']; ?></td>
			<td><?php echo $user['institucion_id']; ?></td>
			<td><?php echo $user['created']; ?></td>
			<td><?php echo $user['updated']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array(), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
