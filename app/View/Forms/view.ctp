<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"> <?php echo __('Formulario'); ?> </h3>
	</div>
	<div class="panel-body">
		
		<table class="table table-striped table-bordered">
			<tbody>
				<tr>
					<td> Id	</td>
					<td>
						<?php echo h($form['Form']['id']); ?>
					</td>
				</tr>
				<tr>
					<td> Nombre	</td>
					<td>
						<?php echo h($form['Form']['name']); ?>
					</td>
				</tr>
				<tr>
					<td> Estado	</td>
					<td>
						<?php echo h($form['Form']['status']); ?>
					</td>
				</tr>
				<tr>
					<td> Creado	</td>
					<td>
						<?php echo h($form['Form']['created']); ?>
					</td>
				</tr>
			</tbody>
		</table>

	</div>
</div>

<div id="questions">
</div>

<?php echo $this->Html->script('servidor'); ?>
<script>
	$.ajax({
		'type'    : 'post',
		'url'     : 'http://'+servidor+'/questions/ajaxIndex',
		'success' : function (data) {
			$('#questions').html(data);
		}
	});
</script>

