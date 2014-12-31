<br>
<br>
<div class="span4">
	<?php
	echo $this->Session->flash('auth');
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => '', 'placeholder' => 'Usuario'));
	echo $this->Form->input('password', array('label' => '', 'placeholder' => 'Contraseña'));
	echo $this->Form->input('Ingresar', array('type' => 'submit', 'label' => '', 'class' => 'btn btn-primary input-block-level'));
	echo $this->Form->end();
	?>
	<a href="<?php echo $this->Html->url(array('controller' => 'websites', 'action' => 'recuperarPassword')) ?>"> Recuperar password
	</a>
</div>