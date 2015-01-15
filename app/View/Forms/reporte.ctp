<center>
	<h1>
		<?php echo $form['Institucion']['name']; ?>
	</h1>
	<h3> Reporte de Evaluación </h3>
</center>
<p>
Nombre de formulario: <strong> <?php echo h($form['Form']['name']); ?> </strong>
</p>
<p>
Realizado: <strong> <?php echo h($form['Form']['implementation']); ?> </strong>
</p>



<table class="table">
	<thead>
		<tr>
			<th> Pregunta </th>
			<th> Si </th>
			<th> No </th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>




<?php echo $form; ?>
