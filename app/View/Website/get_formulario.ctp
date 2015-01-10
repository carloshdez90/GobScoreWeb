<?php echo $this->Html->css('bootstrap.min'); ?>


<?php echo $this->Html->script('servidor'); ?>
<?php echo $this->Html->script('jquery.min'); ?>
<div id="pregunta">
</div>
<script>
	var form_id = <?php echo $form_id; ?>;
	function getPregunta() {
		$.ajax({
			'url'  : 'http://'+servidor+'/website/getPregunta',
			'type' : 'post',
			'data' : { form_id : form_id },
			'success' : function (data) {
				$('#pregunta').html(data);
			}
		});
	}
	getPregunta();
</script>

