<?php include 'tabla_ajax.ctp'; ?>
<?php if ($registros): ?>
	<?php echo $this->Html->limitePaginador($controller, 'paginationAjax', $pagina, $total, $limit); ?>
<?php endif; ?>

