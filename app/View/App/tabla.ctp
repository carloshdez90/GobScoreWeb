<?php
$colspan = 4;
if (!isset($reporte)) {
	$reporte = false;
	$colspan = 3;
}
?>
<table class='table table-condensed table-striped table-hover table-bordered'>
	<thead>
		<tr>
			<th> Id </th>
			<th> Nombre </th>
			<th class="actions" colspan="<?php echo $colspan; ?>"><?php echo __('Actions'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registros as $registro): ?>
			<tr>
				<td><?php echo h($registro[$modelo]['id']); ?>&nbsp;</td>
				<td><?php echo h($registro[$modelo][$name]); ?>&nbsp;</td>
				<?php echo $this->Html->acciones($registro[$modelo]['id'], $reporte); ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php echo $this->Html->modalAdvertencia($modelo); ?>

<?php echo $this->Html->script('bootstrap.min'); ?>
