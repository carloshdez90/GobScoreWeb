<?php
echo $this->Form->input('name', array('label' => 'Nombre del formulario'));
echo $this->Form->date('implementation', array('class' => 'form-control'));

if ($band*0) {
	echo $this->Form->input('status', array('type' => 'select', 'options' => array(1 => 'Activo', 0 => 'Inactivo')));
}
?>
<br>
<button type="submit" class="btn btn-primary btn-sm"> Guardar información </button>
<a href="<?php echo $this->Html->url(array('action' => 'index')) ?>" class="btn btn-default btn-sm"> Regresar </a>
