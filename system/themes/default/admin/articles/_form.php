	<div class="group">
		<?php echo Form::label('Title', 'title'); ?>
		<?php echo Form::input('title', $article->title, array('id' => 'title')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Article', 'article'); ?>
		<?php echo Form::textarea('body', $article->body, array('id' => 'article')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Status', 'status'); ?>
		<?php echo Form::select('status', $article->status, array('1' => 'Published', '0' => 'Draft'), array('id' => 'article')); ?>
	</div>