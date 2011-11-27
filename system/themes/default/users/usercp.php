<h2>UserCP</h2>
<?php echo Form::open(); ?>
<?php if (isset($errors) and count($errors) > 0) { ?>
	<div class="error">
		<?php echo Html::ul($errors); ?>
	</div>
<?php } ?>
	<div class="group">
		<?php echo Form::label('Current Password', 'current_password'); ?>
		<?php echo Form::password('current_password', '', array('id' => 'current_password')); ?>
	</div>
	<div class="group">
		<?php echo Form::label('Full name', 'name'); ?>
		<?php echo Form::input('name', $current_user->name, array('id' => 'name')); ?>
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