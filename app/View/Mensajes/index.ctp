<div class="mensajes index">
	<h2><?php echo __('Mensajes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('contenido'); ?></th>
			<th><?php echo $this->Paginator->sort('tipo'); ?></th>
			<th><?php echo $this->Paginator->sort('denuncia_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($mensajes as $mensaje): ?>
	<tr>
		<td><?php echo h($mensaje['Mensaje']['id']); ?>&nbsp;</td>
		<td><?php echo h($mensaje['Mensaje']['contenido']); ?>&nbsp;</td>
		<td><?php echo h($mensaje['Mensaje']['tipo']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mensaje['Denuncia']['id'], array('controller' => 'denuncias', 'action' => 'view', $mensaje['Denuncia']['id'])); ?>
		</td>
		<td><?php echo h($mensaje['Mensaje']['created']); ?>&nbsp;</td>
		<td><?php echo h($mensaje['Mensaje']['updated']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mensaje['Mensaje']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mensaje['Mensaje']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mensaje['Mensaje']['id']), array(), __('Are you sure you want to delete # %s?', $mensaje['Mensaje']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mensaje'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Denuncias'), array('controller' => 'denuncias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Denuncia'), array('controller' => 'denuncias', 'action' => 'add')); ?> </li>
	</ul>
</div>
