<table class='table table-condensed table-striped table-hover table-bordered'>
	<thead>
		<tr>
			<th> Id </th>
			<th> Nombre </th>
			<?php if ($eliminar): ?>
				<th class="actions"><?php echo __('Eliminar'); ?></th>
			<?php endif; ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($registros as $registro): ?>
			<tr>
				<td><?php echo h($registro[$modelo]['id']); ?>&nbsp;</td>
				<td><?php echo h($registro[$modelo][$name]); ?>&nbsp;</td>
				<?php if ($eliminar): ?>
					<?php echo $this->Html->eliminar($registro[$modelo]['id']); ?>
				<?php endif; ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php echo $this->Html->modalAdvertenciaAjax($modelo); ?>

<script>
	var controller = '<?php echo $controller; ?>';
	var pagina = '<?php echo $pagina; ?>';
	var total = '<?php echo $total; ?>';
	var limit = '<?php echo $limit; ?>';
	
	$('#delete-button').click(function () {
		var id = $('#id').val();
		$.ajax({
			'type' : 'post',
			'url'     : 'http://'+servidor+'/'+controller+'/deleteAjax/'+id,
			'success' : function (data) {
				alert(data.mensaje);
				buscar(controller, 'paginationAjax', pagina, total, limit);
				$('#question').val('');
			}
		});
	})
</script>