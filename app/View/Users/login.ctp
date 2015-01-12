
<?php
echo $this->Session->flash('auth');
echo $this->Form->create('User');
?>
<p>Enter username and password to continue.</p>
<div class="input-group input-sm">
	<span class="input-group-addon"><i class="fa fa-user"></i></span>
	<?php echo $this->Form->input('username', array('label' => '', 'placeholder' => 'Usuario')); ?>
</div>
<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-lock"></i></span>
	<?php echo $this->Form->input('password', array('label' => '', 'placeholder' => 'Password')); ?>
</div>
<div class="form-actions clearfix">
	<div class="pull-left">
		<a href="#registerform" class="flip-link to-register blue">Create new account</a>
	</div>
	<div class="pull-right">
		<a href="#recoverform" class="flip-link to-recover grey">Lost password?</a>
	</div>
	<input type="submit" class="btn btn-block btn-primary btn-default" value="Login" />
</div>
<?php echo $this->Form->end(); ?>

