<div class="denuncias form">
<?php echo $this->Form->create('Denuncia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Denuncia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('email');
		echo $this->Form->input('tipo');
		echo $this->Form->input('codigo');
		echo $this->Form->input('institucion_id');
		echo $this->Form->input('solucionada');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Denuncia.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Denuncia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Denuncias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Institucions'), array('controller' => 'institucions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Institucion'), array('controller' => 'institucions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Calificacions'), array('controller' => 'calificacions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calificacion'), array('controller' => 'calificacions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mensajes'), array('controller' => 'mensajes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mensaje'), array('controller' => 'mensajes', 'action' => 'add')); ?> </li>
	</ul>
</div>
