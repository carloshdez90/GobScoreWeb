<?php
echo $this->Form->input('name', array('label' => 'Nombre de la denuncia'));
?>
<br>
<button type="submit" class="btn btn-primary btn-sm"> Guardar información </button>
<a href="<?php echo $this->Html->url(array('action' => 'index')) ?>" class="btn btn-default btn-sm"> Regresar </a>
