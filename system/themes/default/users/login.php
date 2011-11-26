<?php echo Form::open(); ?>
<?php if (isset($errors)): ?>
	<div class="error">
		<?php echo Html::ul($errors); ?>
	</div>
<?php endif; ?>
	<div class="group">
		<?php echo Form::label('Username', 'username'); ?>
		<?php echo Form::input('username', '', array('id'=>'username')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Password', 'password'); ?>
		<?php echo Form::password('password', '', array('id'=>'password')); ?>
	</div>
	<div class="group">
		<?php echo Form::submit('submit', 'Login'); ?>
	</div>
<?php echo Form::close(); ?>