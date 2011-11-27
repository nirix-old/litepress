<h2>UserCP</h2>
<?php echo Form::open(); ?>
	<div class="group">
		<?php echo Form::label('Current Password', 'current_password'); ?>
		<?php echo Form::password('current_password', '', array('id' => 'current_password')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Email', 'email'); ?>
		<?php echo Form::input('email', $current_user->email, array('id' => 'email', 'type' => 'email')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('New Password', 'new_password'); ?>
		<?php echo Form::input('new_password', '', array('id' => 'new_password')); ?>
	</div>
	<div class="group">
		<?php echo Form::submit('submit', 'Save'); ?>
	</div>
<?php echo Form::close(); ?>