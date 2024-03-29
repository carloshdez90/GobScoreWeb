<div class="denuncias view">
	<table class="table table-condensed table-bordered table-striped table-hover">
		<tbody>
			<tr>
				<td> Tipo de denuncia </td>
				<td> <?php echo h($tipos[$denuncia['Denuncia']['tipo_id']]); ?>&nbsp; 
				</td>
			</tr>
			<tr>
				<td> Código de referencia </td>
				<td> <?php echo h($denuncia['Denuncia']['codigo']); ?>&nbsp; </td>
			</tr>
			<tr>
				<td> Correo asociado </td>
				<td> <?php echo h($denuncia['Denuncia']['email']); ?>&nbsp; </td>
			</tr>
			<tr>
				<td> Fecha y hora de envío </td>
				<td> <?php echo h($denuncia['Denuncia']['created']); ?>&nbsp; </td>
			</tr>
		</tbody>
	</table>
</div>
<br>
<div style="text-align:right;">
	<a href="<?php echo $this->Html->url(array('action' => 'index')) ?>"
	   class="btn btn-default btn-sm"> Regresar </a>
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
<br>
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
		
		<?php echo $this->Form->input('contenido', array('label' => 'Respuesta al ciudadano', 'type' => 'textarea', 'placeholder' => 'Respuesta al ciudadano.')); ?>
		<?php echo $this->Form->hidden('denuncia_id', array('value' => $denuncia['Denuncia']['id'])); ?>
		
		<?php echo $this->Form->submit('Responder', array('class'  => 'btn btn-sm btn-primary')); ?>
		<?php echo $this->Form->end(); ?>
	<?php endif; ?>
</div>
