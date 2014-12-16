<div class="mensajes view">
<h2><?php echo __('Mensaje'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mensaje['Mensaje']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contenido'); ?></dt>
		<dd>
			<?php echo h($mensaje['Mensaje']['contenido']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo'); ?></dt>
		<dd>
			<?php echo h($mensaje['Mensaje']['tipo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Denuncia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mensaje['Denuncia']['id'], array('controller' => 'denuncias', 'action' => 'view', $mensaje['Denuncia']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($mensaje['Mensaje']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($mensaje['Mensaje']['updated']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mensaje'), array('action' => 'edit', $mensaje['Mensaje']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mensaje'), array('action' => 'delete', $mensaje['Mensaje']['id']), array(), __('Are you sure you want to delete # %s?', $mensaje['Mensaje']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mensajes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mensaje'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Denuncias'), array('controller' => 'denuncias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Denuncia'), array('controller' => 'denuncias', 'action' => 'add')); ?> </li>
	</ul>
</div>
