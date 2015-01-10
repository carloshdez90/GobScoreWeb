<?php echo $this->Form->input('name', array('label' => 'Nombre de la institución')); ?>
<?php echo $this->Form->input('User.0.name', array('label' => 'Administrador')); ?>
<?php echo $this->Form->input('User.0.username', array('label' => 'Email del administrador', 'type' => 'email')); ?>
<br>
<?php echo $this->Form->submit('Guardar información', array('class' => 'btn btn-primary btn-sm')); ?>