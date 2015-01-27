<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<td> Id	</td>
			<td>
				<?php echo h($user['User']['id']); ?>
			</td>
		</tr>
		<tr>
			<td> Nombre	</td>
			<td>
				<?php echo h($user['User']['name']); ?>
			</td>
		</tr>
		<tr>
			<td> Nombre de usuario </td>
			<td>
				<?php echo h($user['User']['username']); ?>
			</td>
		</tr>
		<tr>
			<td> Institución </td>
			<td>
				<?php echo $this->Html->link($user['Institucion']['name'], array('controller' => 'institucions', 'action' => 'view', $user['Institucion']['id'])); ?>
			</td>
		</tr>
	</tbody>
</table>
<br>
<a href="<?php echo $this->Html->url(array('action' => 'edit', $user['User']['id'])) ?>" class="btn btn-primary btn-sm"> Editar información </a>
<a href="<?php echo $this->Html->url(array('action' => 'index')) ?>" class="btn btn-default btn-sm"> Regresar </a>