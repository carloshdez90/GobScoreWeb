<?php echo $this->Form->input('name', array('label' => 'Nombre de la institución')); ?>
<?php echo $this->Form->input('User.0.name', array('label' => 'Administrador')); ?>
<?php echo $this->Form->input('User.0.username', array('label' => 'Email del administrador', 'type' => 'email')); ?>
<br>
<button type="submit" class="btn btn-primary btn-sm"> Guardar información </button>
<a href="<?php echo $this->Html->url(array('action' => 'index')) ?>" class="btn btn-default btn-sm"> Regresar </a>