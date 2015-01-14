
<?php
echo $this->Session->flash('auth');
echo $this->Form->create('User');
?>
</br>
<p>Ingrese usuario y contraseña para continuar.</p>
</br>
<div class="input-group input-sm">
	<span class="input-group-addon"><i class="fa fa-user"></i></span>
	<?php echo $this->Form->input('username', array('label' => '', 'placeholder' => 'Usuario')); ?>
</div>
<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-lock"></i></span>
	<?php echo $this->Form->input('password', array('label' => '', 'placeholder' => 'Contraseña')); ?>
</div>
</br>
<div class="form-actions clearfix">	
	<input type="submit" class="btn btn-block btn-primary btn-default" value="Ingresar" />
</div>
<?php echo $this->Form->end(); ?>

