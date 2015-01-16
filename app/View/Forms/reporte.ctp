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
		<?php foreach ($form['Question'] as $item): ?>
			<tr>
				<td> <?php echo $item['name']; ?> </td>
				<td> <?php echo $item['si']; ?> % </td>
				<td> <?php echo $item['no']; ?> % </td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<br>

<form action="<?php echo $this->Html->url(array('action' => 'csv')); ?>" method="POST">
	<input type="hidden" name="id" value="<?php echo $form['Form']['id']; ?>">
	<a href="<?php echo $this->Html->url(array('action' => 'download')) ?>"
	   target="_blank"
	   id="descargar"
	   class="btn btn-primary"> Descargar pdf
	</a>
	<button type="submit" name="csv" class="btn btn-success">
	Exportar csv
	</button>
</form>