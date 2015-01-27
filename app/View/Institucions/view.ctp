
<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<td> Id	</td>
			<td>
				<?php echo h($institucion['Institucion']['id']); ?>
			</td>
		</tr>
		<tr>
			<td> Nombre	</td>
			<td>
				<?php echo h($institucion['Institucion']['name']); ?>
			</td>
		</tr>
	</tbody>
</table>
<br>
<a href="<?php echo $this->Html->url(array('action' => 'edit', $institucion['Institucion']['id'])) ?>" class="btn btn-primary btn-sm"> Editar información </a>
<a href="<?php echo $this->Html->url(array('action' => 'index')) ?>" class="btn btn-default btn-sm"> Regresar </a>
