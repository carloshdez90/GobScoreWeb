
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
<br>
<div style="text-align:right">
	<a href="<?php echo $this->Html->url(array('action' => 'edit', $form['Form']['id'])) ?>"
	   class="btn btn-primary btn-sm"> Editar información </a>
	<a href="<?php echo $this->Html->url(array('action' => 'index')) ?>"
	   class="btn btn-default btn-sm"> Regresar </a>
</div>


<script>
	var form_id = '<?php echo $form['Form']['id']; ?>';
</script>

<br>
<div id="questions">
</div>


<script>			   
	function cargar() {
		$.ajax({
			'type'    : 'post',
			'url'     : 'http://'+servidor+'/questions/indexAjax',
			'data'    : {
				'foreign' : 'form_id',
 				'form_id' : form_id,
			},
			'success' : function (data) {
				$('#questions').html(data);
			}
		});	
	}
	cargar();
</script>
