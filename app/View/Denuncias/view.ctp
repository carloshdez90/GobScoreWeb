<div class="denuncias view">
	<table class="table table-condensed table-bordered table-striped table-hover">
		<tbody>
			<tr>
				<td> Id	</td>
				<td> <?php echo h($denuncia['Denuncia']['id']); ?>&nbsp; </td>
			</tr>
			<tr>
				<td> Tipo de denuncia </td>
				<td> <?php echo h($denuncia['Denuncia']['tipo_id']); ?>&nbsp; </td>
			</tr>
			<tr>
				<td> Codigo	</td>
				<td> <?php echo h($denuncia['Denuncia']['codigo']); ?>&nbsp; </td>
			</tr>
			<tr>
				<td> Institucion </td>
				<td> <?php echo h($denuncia['Institucion']['name']); ?>&nbsp; </td>
			</tr>
			<tr>
				<td> Estado </td>
				<td> <?php echo h($denuncia['Denuncia']['estado']); ?>&nbsp; </td>
			</tr>
		</tbody>
	</table>
</div>


<div class="related">
	<?php if (!empty($denuncia['Mensaje'][0])): ?>
		<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Denuncia ciudadana'); ?></th>
			</tr>
			<tr>
				<td><?php echo $denuncia['Mensaje'][0]['contenido']; ?></td>
			</tr>
		</table>
	<?php endif; ?>
</div>

<div class="related">
	<?php if (!empty($denuncia['Mensaje'][1])): ?>
		<table cellpadding = "0" cellspacing = "0">
			<tr>
				<th><?php echo __('Respuesta al ciudadano'); ?></th>
			</tr>
			<tr>
				<td><?php echo $denuncia['Mensaje'][1]['contenido']; ?></td>
			</tr>
		</table>
	<?php else: ?>
		<?php echo $this->Form->create('Mensaje', array('controller' => 'mensajes', 'action' => 'add')); ?>
		
		<?php echo $this->Form->input('contenido', array('type' => 'textarea', 'placeholder' => 'Respuesta al ciudadano.')); ?>
		<?php echo $this->Form->hidden('denuncia_id', array('value' => $denuncia['Denuncia']['id'])); ?>
		
		<?php echo $this->Form->submit('Enviar denuncia', array('class'  => 'btn btn-sm btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
	<?php endif; ?>
</div>
