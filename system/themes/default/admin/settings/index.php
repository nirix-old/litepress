<h2>Settings</h2>

<?php echo Form::open(); ?>
	<div class="group">
		<?php echo Form::label('Title', 'title'); ?>
		<?php echo Form::input('title', Input::param('title') ? Input::param('title') : LitePress::setting('title'), array('id' => 'title')); ?>
	</div>
	<div class="group">
		<?php echo Form::submit('submit', 'Save'); ?>
	</div>
<?php echo Form::close(); ?>