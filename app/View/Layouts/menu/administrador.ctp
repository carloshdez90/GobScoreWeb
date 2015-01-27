<ul>
	<li class="<?php echo $denuncias; ?>">
		<a href="<?php echo $this->Html->url(array('controller' => 'denuncias', 'action' => 'index')); ?>">
			<i class="fa fa-bullhorn"></i> <span>Denuncias</span>
		</a>
	</li>
	<li class="<?php echo $forms; ?>">
		<a href="<?php echo $this->Html->url(array('controller' => 'forms', 'action' => 'index')); ?>">
			<i class="fa fa-th-list"></i> <span>Formularios</span>
		</a>
	</li>
</ul>