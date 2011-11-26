<?php echo Form::open(); ?>
<?php if (isset($errors)): ?>
	<div class="error">
		<?php echo Html::ul($errors); ?>
	</div>
<?php endif; ?>
	<div class="group">
		<?php echo Form::label('Full name', 'name'); ?>
		<?php echo Form::input('name', $user->name, array('id'=>'name')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Username', 'username'); ?>
		<?php echo Form::input('username', $user->username, array('id'=>'username')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Password', 'password'); ?>
		<?php echo Form::password('password', $user->password, array('id'=>'password')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Email', 'email'); ?>
		<?php echo Form::input('email', $user->email, array('id'=>'email')); ?>
	</div>
	<div class="group">
		<?php echo Form::submit('submit', 'Create'); ?>
	</div>
<?php echo Form::close(); ?>