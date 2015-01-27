<?php
echo $this->Form->create('User');
?>
</br>
<p>Ingrese su correo electrónico.</p>
</br>
<div class="input-group input-sm">
	<span class="input-group-addon"><i class="fa fa-user"></i></span>
	<?php echo $this->Form->input('username', array('label' => '', 'placeholder' => 'Correo electrónico')); ?>
</div>
</br>
<div class="form-actions clearfix">	
	<input type="submit" class="btn btn-block btn-primary btn-default" value="Solicitar clave" />
</div>
<?php echo $this->Form->end(); ?>