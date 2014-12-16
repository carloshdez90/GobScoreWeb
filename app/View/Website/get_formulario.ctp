<div id="pregunta">
</div>
<script>
	function getPregunta() {
		$.ajax(
			{
				'url' : 'http://'+servidor+'/website/getPregunta/'+<?php echo $form_id; ?>,
				'type' : 'post',
				'data' : {},
				'success' : function (data) {
					$('#pregunta').html(data);
				}
			}
		);
	}
	getPregunta();
</script>

