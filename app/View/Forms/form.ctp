<?php
echo $this->Form->input('name');
echo $this->Form->date('implementation', array('class' => 'form-control'));

if ($band) {
	echo $this->Form->input('status', array('type' => 'select', 'options' => array(1 => 'Activo', 0 => 'Inactivo')));
}
?>
<br>
<?php echo $this->Form->submit('Guardar información', array('class' => 'btn btn-primary btn-sm')); ?>