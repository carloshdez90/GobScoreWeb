<div class="index">
	<h2 class="text-align-right"><?php echo __($modelo); ?></h2>
	<?php echo $this->Html->crearBuscar($controller, 'Agregar '.$modelo, $total); ?>
	<div id="pagination">
		<?php if ($registros): ?>
			<?php include '/home/mathdebian/Documentos/www/encuestas/app/View/App/tabla.ctp'; ?>
			<?php echo $this->Html->limitePaginador($controller, $pagina, $total, $limit); ?>
		<?php endif; ?>
	</div>
</div>
