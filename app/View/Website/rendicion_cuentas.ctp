<?php echo $this->Html->css('bootstrap.min'); ?>


<?php echo $this->Html->script('servidor'); ?>
<?php echo $this->Html->script('jquery.min'); ?>

<div class="row">
	<div class="col-sm-3">
		<div class="list-group">
			<a class="list-group-item active"> Formularios </a>
			<?php foreach($forms as $form): ?>
				<a class="list-group-item" onClick="getFormulario(<?php echo $form['Form']['id'] ?>)">
					<?php echo $form['Form']['name']; ?>
				</a>
			<?php endforeach; ?>
		</div>
	</div>
	<div class="col-sm-9">
		<div id="encuesta">
		</div>
	</div>
</div>


<script>
	var form_id  = null;
	function getFormulario(form_id) {
		$.ajax(
			{
				'url' : 'http://'+servidor+'/website/getFormulario/'+form_id,
				'type' : 'post',
				'data' : {},
				'success' : function (data) {
					$('#encuesta').html(data);
				}
			}
		);	
	}
</script>