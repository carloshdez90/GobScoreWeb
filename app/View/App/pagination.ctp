<?php include 'tabla.ctp'; ?>
<?php if ($registros): ?>
	<?php echo $this->Html->limitePaginador($controller, $pagina, $total, $limit); ?>
<?php endif; ?>

