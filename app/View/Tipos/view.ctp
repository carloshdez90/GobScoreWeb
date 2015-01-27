<table class="table table-striped table-bordered">
	<tbody>
		<tr>
			<td> Id	</td>
			<td>
				<?php echo h($tipo['Tipo']['id']); ?>
			</td>
		</tr>
		<tr>
			<td> Nombre	</td>
			<td>
				<?php echo h($tipo['Tipo']['name']); ?>
			</td>
		</tr>
	</tbody>
</table>
<br>
<a href="<?php echo $this->Html->url(array('action' => 'edit', $tipo['Tipo']['id'])) ?>" class="btn btn-primary btn-sm"> Editar información </a>
<a href="<?php echo $this->Html->url(array('action' => 'index')) ?>" class="btn btn-default btn-sm"> Regresar </a>