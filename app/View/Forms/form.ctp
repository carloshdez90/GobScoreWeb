<?php
echo $this->Form->input('name');
echo $this->Form->hidden('status', array('value' => 1));
echo $this->Form->input('institucion_id');
?>
<br>
<?php echo $this->Form->submit('Guardar información', array('class' => 'btn btn-primary btn-sm')); ?>