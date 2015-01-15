
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



<script>
	var form_id = '<?php echo $form['Form']['id']; ?>';
</script>

<br>
<div id="questions">
</div>

<?php echo $this->Html->script('servidor'); ?>
<script>
	$.ajax({
		'type'    : 'post',
		'url'     : 'http://'+servidor+'/questions/indexAjax',
		'success' : function (data) {
			$('#questions').html(data);
		}
	});				   
	function cargar() {
		$.ajax({
			'type'    : 'post',
			'url'     : 'http://'+servidor+'/questions/indexAjax',
			'success' : function (data) {
				$('#questions').html(data);
			}
		});	
	}
</script>
