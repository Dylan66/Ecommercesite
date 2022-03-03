<?php  if (count($errors) > 0) : ?>
	<div class="alert alert-danger alert-dismissible animated flash">
		<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
		<?php foreach ($errors as $error) : ?>
			<i class="fas fa-exclamation-triangle"></i> <?php echo $error ?>
		<?php endforeach ?>
	</div>
<?php  endif ?>
