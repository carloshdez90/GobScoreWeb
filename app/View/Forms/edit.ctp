<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title"> <?php echo __('Editar formulario'); ?> </h3>
	</div>
	<div class="panel-body">

		<div class="forms form">
			<?php echo $this->Form->create('Form'); ?>
			<fieldset>
				<?php echo $this->Form->input('id'); ?>
				<?php include 'form.ctp'; ?>
			</fieldset>
			<?php echo $this->Form->end(); ?>
		</div>
		
	</div>
</div>