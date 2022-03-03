<?php  if (count($success) > 0) : ?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
		<?php foreach ($success as $msg) : ?>
			<i class="fas fa-check-circle"></i> <?php echo $msg ?>
		<?php endforeach ?>
	</div>
<?php  endif ?>
