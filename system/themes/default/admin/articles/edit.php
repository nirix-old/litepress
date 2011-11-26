<h2>Edit Article</h2>
<?php echo Form::open(); ?>
	<?php echo $theme->view('admin/articles/_form', array('article' => $article))->render(); ?>
	<div class="group">
		<?php echo Form::submit('submit', 'Save'); ?>
	</div>
<?php echo Form::close(); ?>