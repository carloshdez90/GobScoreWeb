<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"> <?php echo __('Institución'); ?> </h3>
	</div>
	<div class="panel-body">
		
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

	</div>
</div>
