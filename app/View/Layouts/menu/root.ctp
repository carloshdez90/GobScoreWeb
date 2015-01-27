<ul>
	<li class="<?php echo $institucions; ?>">
		<a href="<?php echo $this->Html->url(array('controller' => 'institucions', 'action' => 'index')); ?>">
			<i class="fa fa-home"></i><span>Instituciones</span>
		</a>
	</li>
	<li class="<?php echo $users; ?>">
		<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'index')); ?>">
			<i class="fa fa-users"></i><span>Administradores</span>
		</a>
	</li>
	<li class="<?php echo $tipos; ?>">
		<a href="<?php echo $this->Html->url(array('controller' => 'tipos', 'action' => 'index')); ?>">
			<i class="fa fa-list"></i><span>Tipo denuncias</span>
		</a>
	</li>
</ul>