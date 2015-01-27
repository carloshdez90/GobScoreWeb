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
			<?php if ($adicional): ?>
				<th>
					<?php echo $adicional['titulo']; ?>
					<?php
					$modelo_tmp = $modelo;
					if (isset($adicional['padre'])) {
						$modelo_tmp = $adicional['padre'];
					}
					?>
				</th>
			<?php endif; ?>
			<th class="actions" colspan="<?php echo $colspan; ?>"><?php echo __('Acciones'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registros as $registro): ?>
			<tr>
				<td><?php echo h($registro[$modelo]['id']); ?>&nbsp;</td>
				<td><?php echo h($registro[$modelo][$name]); ?>&nbsp;</td>
				<?php if ($adicional): ?>
					<td><?php echo h($registro[$modelo_tmp][$adicional['indice']]); ?>&nbsp;</td>
				<?php endif; ?>
				<?php if (null != $acciones): ?>
					<?php
					$tmp = '';
					if (isset($registro['lleno'])) {
						if ($registro['lleno']) {
							$tmp = 'VerReporte';
						}
					}
					?>
					<?php echo $this->Html->{$acciones.$tmp}($registro[$modelo]['id'], $reporte); ?>
				<?php endif; ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<?php echo $this->Html->modalAdvertencia($modelo); ?>

<?php echo $this->Html->script('bootstrap.min'); ?>
