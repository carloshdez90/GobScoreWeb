<?php
echo $this->Form->input('name', array('label' => 'Nombre'));
echo $this->Form->input('username');
echo $this->Form->input('institucion_id');
?>
<br>
<button type="submit" class="btn btn-primary btn-sm"> Guardar información </button>
<a href="<?php echo $this->Html->url(array('action' => 'index')) ?>" class="btn btn-default btn-sm"> Regresar </a>