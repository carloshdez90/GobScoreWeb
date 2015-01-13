<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Institucion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Institucion']['name'], array('controller' => 'institucions', 'action' => 'view', $user['Institucion']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>

