<h4 class="center">
	<?php echo $question['Question']['name']; ?>
</h4>

<?php if ($question['Question']['name']): ?>
	<div class="center">
		<button class="btn btn-primary btn-sm" onClick="calificarPregunta(1)"> <i class="glyphicon glyphicon-ok"></i> Si </button>
		<button class="btn btn-warning btn-sm" onClick="calificarPregunta(0)"> <i class="glyphicon glyphicon-remove"></i> No </button>
	</div>
<?php endif; ?>

<script>
	function calificarPregunta(nota) {
		$.ajax(
			{
				'url' : 'http://'+servidor+'/website/calificarPregunta/'+<?php echo $question['Question']['id']; ?>+'/'+nota,
				'type' : 'post',
				'data' : {},
				'success' : function (data) {
					if (data) {
						getPregunta();	
					}
				}
			}
		);
	}
</script>
