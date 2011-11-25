<?php echo Form::open(); ?>
	<div class="group">
		<?php echo Form::label('Full name', 'name'); ?>
		<?php echo Form::input('name', '', array('id'=>'name')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Username', 'username'); ?>
		<?php echo Form::input('username', '', array('id'=>'username')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Password', 'password'); ?>
		<?php echo Form::password('password', '', array('id'=>'password')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Email', 'email'); ?>
		<?php echo Form::input('email', '', array('id'=>'email')); ?>
	</div>
	<div class="group">
		<?php echo Form::submit('submit', 'Create'); ?>
	</div>
<?php echo Form::close(); ?>