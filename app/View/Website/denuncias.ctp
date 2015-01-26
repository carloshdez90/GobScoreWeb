<?php echo $this->Form->create('Denuncia', array('id' => 'contact-form')); ?>
<div class="control-group">
    <div class="controls">
        <?php echo $this->Form->input('nombre', array('placeholder' => 'Escribe tu nombre', 'label' => '', 'class' => 'span12')); ?>
    </div>
</div>
<?php echo $this->Form->input('email', array('placeholder' => 'Escribe tu email', 'label' => '')); ?>
<?php echo $this->Form->input('tipo_id', array('label' => '')); ?>
<?php echo $this->Form->input('institucion_id', array('label' => '')); ?>
<?php echo $this->Form->input('Mensaje.contenido', array('type' => 'textarea', 'placeholder' => 'Escribe tu denuncia', 'label' => '')); ?>

<?php echo $this->Form->input('mostrar', array('type' => 'select', 'label' => '', 'options' => array(true => 'Publicar', false => 'No publicar'))); ?> 

<?php echo $this->Form->submit('Enviar denuncia', array('class'  => 'message-btn')); ?>

<?php echo $this->Form->end(); ?>
