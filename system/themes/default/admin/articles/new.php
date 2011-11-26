<h2>New Article</h2>
<?php echo Form::open('-admin/articles/new'); ?>
	<?php echo $theme->view('admin/articles/_form', array('article' => $article))->render(); ?>
	<div class="group">
		<?php echo Form::submit('submit', 'Create'); ?>
	</div>
<?php echo Form::close(); ?>