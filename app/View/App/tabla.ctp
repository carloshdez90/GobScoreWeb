<table class='table table-condensed table-striped table-hover table-bordered'>
	<thead>
		<tr>
			<th> Id </th>
			<th> Nombre </th>
			<th class="actions" colspan="3"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registros as $registro): ?>
			<tr>
				<td><?php echo h($registro[$modelo]['id']); ?>&nbsp;</td>
				<td><?php echo h($registro[$modelo][$name]); ?>&nbsp;</td>
				<?php echo $this->Html->acciones($registro[$modelo]['id']); ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php echo $this->Html->modalAdvertencia($modelo); ?>
